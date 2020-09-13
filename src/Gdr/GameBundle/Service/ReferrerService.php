<?php
/**
 * Created by JetBrains PhpStorm.
 * User: diego
 * Date: 20/09/13
 * Time: 01:06
 * To change this template use File | Settings | File Templates.
 */

namespace Gdr\GameBundle\Service;

use Doctrine\Bundle\DoctrineBundle\Registry;
use Doctrine\ORM\EntityNotFoundException;
use Gdr\GameBundle\Entity\Location;
use Gdr\GameBundle\Entity\Transaction;
use Gdr\GameBundle\Entity\TransactionType;
use Gdr\ItemsBundle\Entity\Item;
use Gdr\ItemsBundle\Entity\Property;
use Gdr\UserBundle\Entity\Personage;
use Gdr\UserBundle\Entity\Referrer;
use Gdr\UserBundle\Entity\User;
use JMS\DiExtraBundle\Annotation\Inject;
use JMS\DiExtraBundle\Annotation\InjectParams;
use JMS\DiExtraBundle\Annotation\Service;
use JMS\DiExtraBundle\Annotation as DI;
use Symfony\Component\Debug\Exception\FatalErrorException;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class Erario
 *
 * Contiene metodi condivisi per l'erario e la proprietà.
 *
 * @DI\Service("gdr.referrer", public=true)
 */
class ReferrerService
{
    /**
     * @Inject("doctrine.orm.entity_manager")
     * @var \Doctrine\ORM\EntityManager
     */
    public $em;

    /**
     * @Inject("gdr.game_bundle.general")
     * @var \Gdr\GameBundle\General
     */
    public $general;

    /**
     * Viene eseguito durate la registrazione di un nuovo pg. Controlla se mi sono registrato sotto referrer
     * e se ho bisogno di assegnare questo pg.
     */
    public function hasToAssign(User $user, Personage $personage)
    {
        /** @var \Gdr\UserBundle\Entity\Referrer $referrer */
        $referrer = $this->em->getRepository('GdrUserBundle:Referrer')
            ->findOneBy(array('newUser' => $user));


        if (null === $referrer || $referrer->getNewPersonage()) {
            return false;
        } else {
            $referrer->setNewPersonage($personage);
            $this->em->persist($referrer);
            $this->em->flush();

            return true;
        }
    }

    /**
     * Viene eseguito al login. Controlla se i requisiti sono rispettati e quindi se devo pagare i due pg.
     */
    public function hasToPay(Personage $personage)
    {
        $referrer = $this->em->getRepository('GdrUserBundle:Referrer')
            ->findOneBy(array('newPersonage' => $personage, 'isPaid' => false));

        if (null === $referrer) {
            return false;
        }

        if ($personage->getExperience() >= 20) {

            $referrer->setIsPaid(true);

            $personage->setBankAmount($personage->getBankAmount() + 1000);
            $pgReferrer = $referrer->getReferrerPersonage();
            $pgReferrer->setBankAmount($pgReferrer->getBankAmount() + 1000);

            $body = "Ti informiamo che in seguito al raggiungimento dei primi 20 punti esperienza, sono stati
            accreditati sul conto del tuo Personaggio 1000 Mori ed altrettanti saranno aggiunti al conto
            del Personaggio che hai \"menzionato\" al momento della registrazione.";

            $sl = $this->general->createSystemLetter($body, $personage->getId(), "Gestione");

            $body = "Ti informiamo che il Personaggio {$personage->getName()} ha raggiunto i primi 20 punti esperienza e che,
            avendo menzionato il Nick del tuo al momento della creazione, sono stati accreditati sul conto del tuo
            Personaggio 1000 Mori come ringraziamento";
            $sl = $this->general->createSystemLetter($body, $pgReferrer->getId(), "Gestione");

            $this->em->persist($personage);
            $this->em->persist($pgReferrer);
            $this->em->persist($referrer);
            $this->em->flush();

            return true;
        }

        return false;
    }
}