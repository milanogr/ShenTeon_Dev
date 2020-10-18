<?php

namespace Gdr\GameBundle\Controller;

use Gdr\GameBundle\Entity\Transaction;
use Gdr\MeteoBundle\Entity\MeteoStatus;
use Gdr\UserBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CronController extends Controller
{
    const BANK_LIMIT = -10000;
    const OVER_LIMIT_MSG = "<p>La Banca Vi informa che il Vostro conto non è più sufficiente a sostenere le spese di
    gestione e le tasse della Vostra proprietà <strong>%s</strong>. <br> Nonostante ciò Vi diamo la possibilità
    contrarre un debito con la Banca nella speranza che riusciate a saldarlo quanto prima possibile.</p>";
    const ESPROPRIO_MSG = "<p>A causa dei mancati pagamenti delle tasse, l'Erario ha confiscato la Vostra proprietà <strong>%s</strong>.</p>";

    /**
     * Elimina le missive vecchie prima di n giorni.
     */
    public function deleteLettersAction()
    {
        $this->get('gdr.letter')->realRemoveOldLetters();

        $this->get('gdr.logs.cron')->log("Rimosse missive vecchie", "Missive");

        return new Response("ok");
    }

    /**
     * @return Response
     */
    public function generateItemsFromPropertiesAction()
    {
        $em = $this->getDoctrine()->getManager();
        $msg = "Il Cron è partito: <br><br>";

        $activitiesNulled = $this->getDoctrine()->getRepository('GdrItemsBundle:Property')
            ->getActivitiesWithProductsAndNulledProduction();

        foreach ($activitiesNulled as $activity) {
            var_dump($activity->getname(), $activity->getFrequencyItems());
            $days = $activity->getFrequencyItems();
            $date = new \DateTime("+{$days} days");
            $activity->setNextProductionAt($date);
            $em->persist($activity);
        }
        $em->flush();

        $activities = $this->getDoctrine()->getRepository('GdrItemsBundle:Property')
            ->getActivitiesWithProducts();

        $general = $this->get('gdr.game_bundle.general');

        $countProd = 0;
        $countNotProd = 0;

        foreach ($activities as $activity) {
            if (new \DateTime() >= $activity->getNextProductionAt()) {

                $propertyItems = $this->getDoctrine()->getRepository('GdrItemsBundle:PropertyItem')
                    ->findBy(
                        array(
                            'property' => $activity
                        )
                    );

                $msg .= "<br>Generati per {$activity->getOwner()->getName()}: ";
                foreach ($propertyItems as $propItem) {
                    $general->itemsToInventory($propItem->getQuantity(), $activity->getOwner(), $propItem->getItem());
                    $msg .= $propItem->getItem() . " x{$propItem->getQuantity()} (id:{$propItem->getItem()->getId(
                        )}) | ";
                }

                $days = $activity->getFrequencyItems();
                $date = new \DateTime("+{$days} days");
                $activity->setNextProductionAt($date);
                $em->persist($activity);

                // Spedisco la missiva
                $msgLetter = "<p>Ti sono stati assegnati nell'inventario gli oggetti prodotti dalla tua attività: {$activity->getName(
                )}</p>";

                $general->createSystemLetter($msgLetter, $activity->getOwner()->getId(), 'Erario');

                $countProd += 1;
            } else {
                $msg .= "<br>Niente da produrre per " . $activity->getName() . " di " . $activity->getOwner()->getName() . ".";
                $countNotProd += 1;
            }
        }

        $em->flush();

        $this->get('gdr.logs.cron')->log("Generazione oggetti attivita: interessate ({$countProd}), non interessate ({$countNotProd})", "Attivita");

        return new Response('<br>Operazione conclusa.');
    }

    /**
     * @return Response
     */
    public function applyTaxFromPropertiesAction()
    {
        $em = $this->getDoctrine()->getManager();

        $general = $this->get('gdr.game_bundle.general');

        $transactionType = $this->getDoctrine()->getRepository('GdrGameBundle:TransactionType')
            ->findOneBy(array('name' => 'Erario'));

        $activities = $this->getDoctrine()->getRepository('GdrItemsBundle:Property')
            ->getAllWithOwner();

        $text_messaggio = "Cron avviato: <br><br>";
        $count = 0;
        $countRed = 0;
        $countEspro = 0;
        $countPrelievo = 0;
        $countPrePay = 0;

        foreach ($activities as $activity) {

            $text_messaggio .= "<br>Attività {$activity->getName()} di {$activity->getOwner()}: ";

            if (null === $activity->getNextTaxAt()) {
                $activity->setNextTaxAt(new \DateTime("next month + 7 days"));
                $em->persist($activity);
                $em->flush();
                $text_messaggio .= "ho aggiornato al prossimo mese la tassa. <br>";
                $count += 1;
            }

            if (new \DateTime() >= $activity->getNextTaxAt()) {

                $owner = $activity->getOwner();

                // Il proprietario ha soldi?
                // Se non ha soldi va in rosso fino al limite e mando missiva. Superato il limite lo esproprio.
                $newBankAmount = $owner->getBankAmount() - $activity->getTax();
                if ($newBankAmount < 0 && $newBankAmount >= self::BANK_LIMIT) {

                    $avviso = sprintf(self::OVER_LIMIT_MSG, $activity->getName());
                    $sl = $general->createSystemLetter($avviso, $owner->getId(), "Erario");
                    $activity->setNextTaxAt(new \DateTime("next month + 7 days"));

                    $text_messaggio .= " ho notificato che è andato in rosso <br>";
                    $transMsg = "Pagamento della Tassa di Possesso dell'immobile {$activity->getName()}";

                    $transaction = new Transaction();
                    $transaction->setType($transactionType);
                    $transaction->setSubject($owner);
                    $transaction->setAmount($activity->getTax());
                    $transaction->setNote($transMsg);
                    $em->persist($transaction);

                    $countRed += 1;

                } elseif ($newBankAmount < 0 && $newBankAmount < self::BANK_LIMIT) {
                    $newBankAmount = ceil($activity->getPrice() / 2);

                    $avviso = sprintf(self::ESPROPRIO_MSG, $activity->getName());
                    $sl = $general->createSystemLetter($avviso, $owner->getId(), "Erario");

                    $servizio = $this->get('gdr.erario');
                    $servizio->sellProperty($activity->getOwner(), $activity, false);

                    $text_messaggio .= " ho notificato che gli è stata espropriata un'attività <br>";

                    $countEspro += 1;

                } else {
                    $letterBody = "<p>La Signoria Vi informa che sono stati prelevati dal Vostro conto <strong>{$activity->getTax(
                    )}</strong> Mori necessari al pagamento della Tassa di Possesso del Vostro immobile <strong>{$activity->getName(
                    )}</strong>.</p>";
                    $sl = $general->createSystemLetter($letterBody, $owner->getId(), "Erario");

                    $activity->setNextTaxAt(new \DateTime("next month + 7 days"));
                    $activity->setIsTaxNotified(false);

                    $em->persist($owner);
                    $em->persist($activity);

                    $text_messaggio .= " ho riscosso la tassa. <br>";
                    $transMsg = "Pagamento della Tassa di Possesso dell'immobile {$activity->getName()}";

                    $transaction = new Transaction();
                    $transaction->setType($transactionType);
                    $transaction->setSubject($owner);
                    $transaction->setAmount($activity->getTax());
                    $transaction->setNote($transMsg);
                    $em->persist($transaction);

                    $countPrelievo += 1;
                }

                $owner->setBankAmount($newBankAmount);
                $em->persist($owner);
                $em->flush();
            }

            // (10) | 10+7=17 >= 15
            if (new \DateTime("+7 days") >= $activity->getNextTaxAt() && false === $activity->getIsTaxNotified() && $activity->getOwner() !== null
            ) {
                $letterBody = "La Signoria Vi informa che tra 7 giorni verranno prelevati dal Vostro conto i Mori
                necessari ({$activity->getTax()}) al pagamento della Tassa di Possesso della Vostra attività
                <strong>{$activity->getName()}</strong>.";
                $general->createSystemLetter($letterBody, $activity->getOwner()->getId(), "Erario");

                $activity->setIsTaxNotified(true);

                $em->persist($activity);
                $em->flush();

                $countPrePay += 1;

                $text_messaggio .= " ho notificato che tra 7 giorni tocca pagare la tassa. <br>";
            }
        }

        $this->get('gdr.logs.cron')->log("Tasse proprietà: aggiornate al mexe prox ({$count}), rosso ({$countRed}), espropiate ({$countEspro}), prelevate ({$countPrelievo}), avvertiti ({$countPrePay})", "Property");

        return new Response('Fine.');
    }

    public function checkOverAgeAction()
    {
        $pgs = $this->getDoctrine()->getRepository("GdrUserBundle:Personage")->getPersonagesOverAge();
        $em = $this->getDoctrine()->getManager();
        $count = 0;
        foreach ($pgs as $pg):
            $rand = rand(0, 100);
            if ($rand % 3 == 1) {
                // Personaggio morto
                $this->get('gdr.race.service')->killPersonage($pg, false, true);
                $count += 1;
            }
        endforeach;
        $em->flush();

        $this->get('gdr.logs.cron')->log("Players morti per vecchiaia ({$count})", "Players");

        return new Response();
    }

    public function checkBirthdaysAction()
    {
        $pgs = $this->getDoctrine()->getRepository("GdrUserBundle:Personage")->getPersonagesWithBirthday();

        /**
         * @var \Gdr\RaceBundle\Service\Service
         */
        $service = $this->get("gdr.race.service");

        $users = array();

        foreach ($pgs as $pg) {
            $service->handleAgeing($pg);
            $users[] = $pg->getName();
        }

        if (count($users) > 0) {
            $text_messaggio = "Players avanzati di età: (" . implode(" - ", $users) . ")";
        } else {
            $text_messaggio = "Players avanzati di età: (0)";
        }

        $this->get('gdr.logs.cron')->log($text_messaggio, "Players");

        return new Response();
    }

    public function expireOldItemsAction()
    {
        $inventories = $this->getDoctrine()->getRepository('GdrItemsBundle:Inventory')
            ->getExpiredItems();

        $general = $this->get('gdr.game_bundle.general');
        $lastPg = null;

        $users = array();
        $items = array();

        foreach ($inventories as $inv) {
            $pg_id = $inv->getPersonage()->getId();
            if (!array_key_exists($pg_id, $users)) {
                $users[$pg_id] = $inv->getPersonage();
                $items[$pg_id] = array();
                $array = $items[$pg_id];
            } else {
                $array = $items[$pg_id];
            }
            $array[] = $inv->getItem()->getName();
            $items[$pg_id] = $array;
            unset($array);
            unset($pg_id);
        }

        $text_messaggio = "";

        foreach ($items as $pg_id => $items) {
            $text_messaggio .= $users[$pg_id] . ":";
            $text = "Ti informiamo che alcuni oggetti scaduti sono stati rimossi dal tuo inventario:";
            $iter = 1;
            foreach ($items as $item) {
                $text_messaggio .= " " . $iter . ". " . $item;
                $text .= " " . $iter . ". " . $item;
                $iter++;
            }
            $text_messaggio .= "<br/>\n";
            $general->createSystemLetter($text, $pg_id, "Inventario");
        }

        $removed = $this->getDoctrine()->getRepository('GdrItemsBundle:Inventory')
            ->deleteExpiredItems();

        $this->get('gdr.logs.cron')->log("Oggetti scaduti rimossi {$removed}", "Items");

        return new Response();
    }

    /**
     * @return Response
     */
    public function checkMoonAction()
    {
        $service = $this->get("gdr.meteo.generator");

        $rep_status = $this->getDoctrine()->getRepository("GdrMeteoBundle:MoonStatus");
        $status = $rep_status->findOneBy(array());

        $text_messaggio = "Luna non generata";

        if ($status instanceof \Gdr\MeteoBundle\Entity\MoonStatus) {
            if ($status->isExpired()) {
                $service->generateMoon($status);
                $text_messaggio = "Luna generata";
            }
        }

        $this->get('gdr.logs.cron')->log($text_messaggio, "Meteo");

        return new Response("Done.");
    }

    /**
     * Controlla la condizione del meteo. Se necessario la rigenera.
     */
    public function checkMeteoAction()
    {

        $service = $this->get("gdr.meteo.generator");

        $rep_status = $this->getDoctrine()->getRepository("GdrMeteoBundle:MeteoStatus");
        $status = $rep_status->findOneBy(array());

        $isNew = false;

        if (null === $status) {
            echo "Status null, nuovo meteo";
            $service->generateMeteo(new MeteoStatus());
        }

        if ($status->isExpired()) {
            echo "Generazione nuovo meteo expired...";
            $service->generateMeteo($status);
            $isNew = true;
        }

        $this->get('gdr.logs.cron')->log("Meteo generato ({$isNew})", "Meteo");

        return new Response("Fine.");
    }

    /**
     * Metodo deprecato, serviva solo la prima volta.
     *
     * @param int $confirm
     * @return Response
     */
    public function assignXpAction($confirm = 1)
    {
        $pgs = $this->getDoctrine()->getRepository('GdrUserBundle:Personage')
            ->getPgForXp();
        $em = $this->getDoctrine()->getManager();

        foreach ($pgs as $pg) {
            $points = intval($pg->getExperience() / 150);
            $pg->setCombatLevel(0);
            $pg->setCombatPoints($points);
            if ($confirm == 2) {
                $em->persist($pg);
            }

            echo $pg->getName() . " ($points) <br>";
        }

        if ($confirm == 2) {
//            $em->flush();
            echo "FATOOOOOOOOOOOOOOO";
        }

        return new Response("asd!");
    }

    /**
     * TODO
     */
    public function removeInactiveUsers()
    {
        // Non deve avere:
        // - più di 1 pt carisma
        // - 0 punti esperienza totali
        // - nessun movimento bancario

    }

    public function testEmailAction(){
        $email = \Swift_Message::newInstance()
            ->setSubject('Conferma della registrazione')
            ->setFrom('registrazione@shenteon.com')
            ->setTo('diego.v@delex-ws.it')
            ->setBody(
               'test'
            );

        return var_dump($this->get('mailer')->send($email));
    }
}