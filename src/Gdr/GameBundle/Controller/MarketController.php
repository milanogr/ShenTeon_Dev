<?php
namespace Gdr\GameBundle\Controller;

use Doctrine\ORM\EntityNotFoundException;
use Gdr\GameBundle\Entity\Transaction;
use Gdr\GameBundle\Entity\TransactionType;
use Gdr\ItemsBundle\Entity\Inventory;
use Gdr\ItemsBundle\Entity\Item;
use Gdr\ItemsBundle\Entity\Market;
use Gdr\UserBundle\Controller\Controller;
use Gdr\UserBundle\Entity\Personage;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Debug\Exception\FatalErrorException;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Doctrine\DBAL\DriverManager;

/**
 * Letter controller.
 *
 */
class MarketController extends Controller
{
    /**
     * Visualizza la lista dei mercati disponibili solo se non ho nessun oggetto che mi garantisce l'accesso
     * all'emporio/mercato nero di livello > 0
     *
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Doctrine\ORM\EntityNotFoundException
     */
    public function indexAction()
    {
        // Recupero i permessi per visualizzare i mercati.
        $check = $this->getValueForCheck($this->getPersonage()->getId());

        // Recupero i 3 mercati.
        $emporio = $this->getDoctrine()
            ->getRepository('GdrItemsBundle:Market')
            ->findOneBy(array('name' => Market::EMPORIO));

        $nero = $this->getDoctrine()
            ->getRepository('GdrItemsBundle:Market')
            ->findOneBy(array('name' => Market::NERO));

        $pozioni = $this->getDoctrine()
            ->getRepository('GdrItemsBundle:Market')
            ->findOneBy(array('name' => Market::POZIONI));


        if (null === $emporio || null === $nero || null === $pozioni) {
            throw new EntityNotFoundException('Un mercato non esiste più.');
        }

        return $this->render(
            'GdrGameBundle:Market:index.html.twig',
            array(
                'check' => $check,
                'emporio' => $emporio,
                'nero' => $nero,
                'pozioni' => $pozioni,
                'enclave' => $this->getPersonage()->hasEnclave(),
                'clan' => $this->getPersonage()->hasClan()
            )
        );
    }

    /**
     * Visualizza la lista degli oggetti suddivisa per categorie. Se non è specificata la categoria, viene usata la prima
     * in ordine alfabetico.
     *
     * @param $mercato
     * @param $livello
     * @param $categoria
     *
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Doctrine\ORM\EntityNotFoundException
     */
    public function listItemsAction(Request $request, $mercato, $livello, $categoria)
    {
        // Posso accedere a questo mercato?
        $mercato = $this->canViewMarket($livello, $mercato);

        // Se non ho specificato nessuna categoria, recupero la prima in ordine alfabetico per il mercato corrente
        if (null === $categoria || $categoria == 0) {
            $category = $this->getDoctrine()
                ->getRepository('GdrItemsBundle:ItemType')
                ->findCategoryByMarket($mercato);
        } else {
            // La categoria è valida?
            $category = $this->getDoctrine()
                ->getRepository('GdrItemsBundle:ItemType')
                ->findOneBy(array('id' => $categoria));
        }

        if (null === $category) {
            throw new EntityNotFoundException('La categoria non esiste.');
        }

        // Recupero gli oggetti per il mercato corrente.

        if ($mercato->getName() == Market::ENCLAVE) {
            $items = $this->getDoctrine()
                ->getRepository('GdrItemsBundle:Item')
                ->findActiveItemsByEnclaveAndMarketAndCategoryQuery($this->getPersonage()->hasEnclave(), $mercato->getId(), $category->getId(), true);
       }else if($mercato->getName() == Market::CLAN){
            $items = $this->getDoctrine()
                ->getRepository('GdrItemsBundle:Item')
                ->findActiveItemsByEnclaveAndMarketAndCategoryQuery($this->getPersonage()->hasClan(), $mercato->getId(), $category->getId(), false);
        }else {
            $items = $this->getDoctrine()
                ->getRepository('GdrItemsBundle:Item')
                ->findActiveItemsByLevelAndMarketAndCategoryQuery($livello, $mercato->getId(), $category->getId());
        }

        $paginator = $this->get('knp_paginator')->paginate($items, $request->query->get('page', 1), 15);


        // Recupero tutte le categorie del mercato per il menù.
        $categories = $this->getDoctrine()
            ->getRepository('GdrItemsBundle:ItemType')
            ->findCategoriesByMarket($mercato->getId());

        return $this->render(
            'GdrGameBundle:Market:market.html.twig',
            array(
                'market' => $mercato,
                'level' => $livello,
                'categories' => $categories,
                'currentCategory' => $category,
                'bankAmount' => $this->getPersonage()->getBankAmount(),
                'paginator' => $paginator,
                'upload_path' => $this->container->getParameter('item_upload_path') . '/',
            )
        );
    }

    /**
     * 1. Ho i permessi per visualizzare questo mercato?
     * 2. L'oggetto da acquistare esiste ancora?
     * 3. La mia quantità rispetta quella esistente?
     * 4. Mi posso permettere il tutto?
     * 5. Tolgo gli item dal mercato e lo aggiungo all'inventario.
     * 6. Tolgo i soldi dal mio conto bancario.
     * 7. Restituisco in ajax la nuova quantità dell'oggetto acquistato al mercato.
     */
    public function buyItemsAction(Request $request, $itemId, $quantity)
    {
        $em = $this->getDoctrine()->getManager();

        // Risposta di default.
        $return = array(
            'response' => false,
            'message' => false,
            'quantityAvailable' => null,
            'bankAmount' => null
        );

        $itemId = $request->get('itemId');
        $quantity = $request->get('quantity');

        // Recupero l'oggetto e verifico che esista ancora.
        $item = $em
            ->getRepository('GdrItemsBundle:Item')
            ->findOneBy(array('id' => $itemId, 'isSellable' => true));

        if (null === $item) {
            $return['error'] = "L'oggetto è stato tolto dal mercato prima che tu potessi effettuare l'acquisto.";

            return new JsonResponse($return);
        }

        // Ho il permesso di comprare l'oggetto?
        $this->canViewMarket($item->getLevel(), $item->getMarket());

        // La quantità selezionata è superiore a quella presente sul mercato?
        if ($quantity > $item->getQuantity()) {
            $return['message'] = 'La quantità selezionata è maggiore di quella presente al mercato.';
            $return['quantityAvailable'] = $item->getQuantity();

            return new JsonResponse($return);
        }

        // La quantità deve essere maggiore di 0.
        if ($quantity <= 0) {
            $return['message'] = 'La quantità selezionata deve essere maggiore di 0.';

            return new JsonResponse($return);
        }

        $totalPrice = $quantity * $item->getPrice();
        $personage = $this->getPersonage();

        // Posso permettermi l'acquisto?
        if ($personage->getBankAmount() < $totalPrice) {
            $return['message'] = "Non disponi dei Mori sufficienti per effettuare l'acquisto. Il tuo conto ammonta a {$this->getPersonage(
            )->getBankAmount()} Mori.";

            return new JsonResponse($return);
        }

        // Se l'oggetto è in mercato di Enclave, devo far parte di tale Enclave
        if ($item->getEnclave() && $personage->hasEnclave() != $item->getEnclave()) {
            $return['message'] = "Non fai parte di questa Enclave.";

            return new JsonResponse($return);
        }

        if ($item->getClan() && $personage->hasClan() != $item->getClan()) {
            $return['message'] = "Non fai parte di questa Enclave Razziale.";

            return new JsonResponse($return);
        }

        // Bene, inizio la procedura d'acquisto. Sottraggo il totale dal conto bancario.
        $newCountValue = $personage->getBankAmount() - $totalPrice;
        $personage->setBankAmount($newCountValue);
        $transactionType = $em
            ->getRepository('GdrGameBundle:TransactionType')
            ->findOneBy(array('id' => TransactionType::MARKET));

        if (null === $transactionType) {
            throw new EntityNotFoundException('TransactionType non trovata!.');
        }

        // Aggiungo la notifica del pagamento.
        $transaction = new Transaction();
        $transaction->setSubject($personage);
        $transaction->setAmount($totalPrice);
        $transaction->setType($transactionType);
        $note = "Hai acquistato al mercato {$quantity} unità di {$item->getName()}.";
        $transaction->setNote($note);

        // Aggiorno la quantità al mercato.
        $newTotalQuantity = $item->getQuantity() - $quantity;
        $item->setQuantity($newTotalQuantity);

        // Inserisco gli oggetti nell'inventario.
        $this->insertItems($quantity, $personage, $item);

        // Eseguo l'effettivo aggiornamento che mi toglie i soldi dal conto, inserisce la transazione ed aggiorna la quantità
        // dell'Item al mercato.
        $em->persist($personage);
        $em->persist($transaction);
        $em->persist($item);
        $em->flush();

        $return['response'] = true;
        $return['message'] = "L'acquisto è andato a buon fine.";
        $return['quantityAvailable'] = $newTotalQuantity;
        $return['bankAmount'] = $newCountValue;

        return new JsonResponse($return);
    }

    /**
     * @param           $quantity
     * @param Personage $personage
     * @param Item $item
     *
     * @throws \Symfony\Component\Debug\Exception\FatalErrorException
     */
    protected function insertItems($quantity, Personage $personage, Item $item)
    {
        if (!$quantity) {
            throw new FatalErrorException('La quantità deve essere almeno 1!');
        }

        // Preparo i dati per la SQL diretta.
        $personage_id = $this->getPersonage()->getId();
        $item_id = $item->getId();
        $isEquipped = 0;
        $isInvisible = 0;
        $isDressed = 0;

        if (!$item->getDurationDays()) {
            $expireAt = null;
        } else {
            $expireAt = date('Y-m-d H:i:s', strtotime("+{$item->getDurationDays()} days"));
        }

        $values = array();

        for ($i = 1; $i <= $quantity; $i++) {
            if (null === $expireAt) {
                $values[] = "({$personage_id}, {$item_id}, {$isEquipped}, {$isInvisible}, null, {$isDressed})";
            } else {
                $values[] = "({$personage_id}, {$item_id}, {$isEquipped}, {$isInvisible}, '{$expireAt}', {$isDressed})";
            }
        }

        $valuesForSql = implode(', ', array_values($values));

        $conn = $this->getDoctrine()->getConnection()->prepare(
            'INSERT INTO Inventory (personage_id, item_id, isEquipped, isInvisible, expireAt, isDressed) VALUES ' . $valuesForSql
        );
        $conn->execute();
    }

    public function testAction()
    {
        var_dump(
            date('Y-m-d H:i:s', time()),
            date('Y-m-d H:i:s', time() + (5 * 24 * 60)),
            date('Y-m-d H:i:s', strtotime("+1 days"))
        );

        return $this->render('GdrGameBundle:Default:profiler.html.twig');
    }

    /**
     * @param null $personage
     *
     * @return \Gdr\ItemsBundle\Entity\Inventory
     */
    protected function getValueForCheck($personage = null)
    {
        if (null === $personage) {
            $personage = $this->getPersonage()->getId();
        }

        return $this->getDoctrine()
            ->getRepository('GdrItemsBundle:Inventory')
            ->getMarketsLevel($personage);
    }

    /**
     * @param $livello
     * @param $mercato_id
     *
     * @return Market
     * @throws \Doctrine\ORM\EntityNotFoundException
     * @throws \Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException
     */
    protected function canViewMarket($livello, $mercato_id)
    {
        $check = $this->getValueForCheck();

        $mercato = $this->getDoctrine()
            ->getRepository('GdrItemsBundle:Market')
            ->findOneBy(array('id' => $mercato_id));


        if (null === $mercato) {
            throw new EntityNotFoundException('Mercato non esistente.');
        }

        if ($mercato == Market::ENCLAVE && $this->getPersonage()->hasEnclave() === false) {
            throw new AccessDeniedHttpException("Non fai parte di nessuna enclave.");
        }

        if ($mercato == Market::CLAN && $this->getPersonage()->hasClan() === false) {
            throw new AccessDeniedHttpException("Non fai parte di nessuna enclave.");
        }

        if ($mercato == Market::EMPORIO && !($check['maxEmporiumLevel'] >= $livello)) {
            throw new AccessDeniedHttpException("Non hai il livello necessario per visualizzare Emporio di livello {$livello}.");
        }

        if ($mercato == Market::NERO && ($livello == 0 || !($check['maxBlackMarketLevel'] >= $livello))) {
            throw new AccessDeniedHttpException("Non hai il livello necessario per visualizzare Nero di livello {$livello}.");
        }

        if ($mercato == Market::POZIONI && ($livello == 0 || !($check['maxPotionMarketLevel'] >= $livello))) {
            throw new AccessDeniedHttpException("Non hai il livello necessario per visualizzare Pozioni di livello {$livello}.");
        }

        return $mercato;
    }
}