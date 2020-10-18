<?php

namespace Gdr\GameBundle\Controller\Location;

use Gdr\GameBundle\Entity\Transaction;
use Gdr\GameBundle\Entity\TransactionType;
use Gdr\UserBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class BankController extends Controller
{
    const BAG_AMOUNT_LIMIT  = 10000;
    const TRANSACTION_LIMIT = 100;

    /**
     * Visualizza la schermata principale dell'Erario.
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $personage = $this->getPersonage();

        // Recupero la lista dei miei trasferimenti.
        $transactions = $em->getRepository('GdrGameBundle:Transaction')
            ->getAllByPersonageQuery($personage);

        $paginator = $this->get('knp_paginator')->paginate($transactions, $request->query->get('page', 1), 15);


        return $this->render(
            'GdrGameBundle:Bank:index.html.twig',
            array(
                'transactions' => $transactions,
                'bankAmount' => $personage->getBankAmount(),
                'bagAmount' => $personage->getBagAmount(),
                'paginator' => $paginator
            )
        );
    }

    public function prelievoAction($quantity)
    {
        $return = array(
            'response' => false,
            'message' => '',
            'bankAmount' => 0,
            'bagAmount' => 0
        );

        $em = $this->getDoctrine()->getManager();
        $personage = $this->getPersonage();

        // La quantità è maggiore di zero?
        if ($quantity < 0) {
            $return['message'] = 'La quantità deve essere maggiore di 0';

            return new JsonResponse($return);
        }

        // Sto ritirando troppi Mori?
        if ($quantity > $personage->getBankAmount()) {
            $return['message'] = 'La quantità da ritirare supera la disponibilità attuale del conto.';

            return new JsonResponse($return);
        }

        // Posso tenere così tanti Mori in tasca?
        $newBagAmount = $quantity + $personage->getBagAmount();
        if ($newBagAmount > BankController::BAG_AMOUNT_LIMIT) {
            $return['message'] = 'Non puoi ritirare così tanti Mori. Il limite che puoi portare con te è di ' . BankController::BAG_AMOUNT_LIMIT . ' Mori.';

            return new JsonResponse($return);
        }

        // Operazione fattibile, ora aggiorno il conto e il bag.
        $newBankAmount = $personage->getBankAmount() - $quantity;
        $personage->setBagAmount($newBagAmount);
        $personage->setBankAmount($newBankAmount);

        // Inserisco l'operazione nelle transazioni.
        $transactionPrelievo = $em->getRepository('GdrGameBundle:TransactionType')->findOneBy(
            array('id' => TransactionType::PRELIEVO)
        );
        $transaction = new Transaction();
        $transaction->setType($transactionPrelievo);
        $transaction->setAmount($quantity);
        $transaction->setSubject($personage);
        $transaction->setNote("Avete eseguito un prelievo dal vostro conto.");

        $em->persist($personage);
        $em->persist($transaction);
        $em->flush();

        $return['response'] = true;
        $return['message'] = 'Il prelievo è stato eseguito.';
        $return['bagAmount'] = $newBagAmount;
        $return['bankAmount'] = $newBankAmount;

        return new JsonResponse($return);
    }

    public function trasferimentoAction()
    {
        $return = array(
            'response' => false,
            'message' => '',
            'bankAmount' => 0,
        );

        $em = $this->getDoctrine()->getManager();
        $personage = $this->getPersonage();

        $quantity = $this->getRequest()->get('quantity');
        $destinatarioNome = $this->getRequest()->get('destinatario');
        $nota = $this->getRequest()->get('nota');

        // La quantità è maggiore di zero?
        if ($quantity < 0) {
            $return['message'] = 'I Mori da trasferire devono essere maggiori di 0';

            return new JsonResponse($return);
        }

        // Sto trasferendo troppi Mori?
        if ($quantity > $personage->getBankAmount()) {
            $return['message'] = 'La quantità da trasferire supera la disponibilità attuale del conto.';

            return new JsonResponse($return);
        }

        // Il destinatario esiste?
        $destinatario = $em->getRepository('GdrUserBundle:Personage')
            ->findOneBy(array('name' => $destinatarioNome));

        if (null === $destinatario) {
            $return['message'] = 'Il destinatario non è stato trovato tra archivi bancari.';

            return new JsonResponse($return);
        }

        // Bene, posso effettuare il trasferimento.
        $newBankAmount = $personage->getBankAmount() - $quantity;
        $personage->setBankAmount($newBankAmount);
        $destinatario->setBankAmount($destinatario->getBankAmount() + $quantity);
        if (!$nota){
            $nota = '';
        }

        // Inserisco l'operazione nelle transazioni per me.
        // TODO: Replace with BankLogger methods
        $transactionTransfer = $em->getRepository('GdrGameBundle:TransactionType')->findOneBy(
            array('id' => TransactionType::TRANSFER)
        );
        $transaction = new Transaction();
        $transaction->setType($transactionTransfer);
        $transaction->setAmount($quantity);
        $transaction->setSubject($personage);
        $transaction->setNote("Avete trasferito dei fondi a {$destinatario->getName()} {$nota}");

        $destTransaction = new Transaction();
        $destTransaction->setType($transactionTransfer);
        $destTransaction->setAmount($quantity);
        $destTransaction->setSubject($destinatario);
        $destTransaction->setSender($personage);
        $destTransaction->setIsPlus(true);
        $destTransaction->setNote("Avete ricevuto dei fondi da {$personage->getName()} {$nota}");

        if ($nota == ""){
            $nota = "nessuna nota";
        }

        $letterBody = "<p>Vi informiamo che {$personage->getName()} ha trasferito sul vostro conto {$quantity} Mori con la seguente
        motivazione: {$nota} </p>";
        $systemLetter = $this->get('gdr.game_bundle.general')->createSystemLetter($letterBody, $destinatario->getId(), "Banca");

        $em->persist($personage);
        $em->persist($destinatario);
        $em->persist($transaction);
        $em->persist($destTransaction);
        $em->flush();

        $return['response'] = true;
        $return['message'] = 'Il trasferimento è stato eseguito.';
        $return['bankAmount'] = $newBankAmount;
        return new JsonResponse($return);
    }

    public function depositoAction()
    {
        $return = array(
            'response' => false,
            'message' => '',
            'bankAmount' => 0,
        );

        $em = $this->getDoctrine()->getManager();
        $personage = $this->getPersonage();

        $quantity = $this->getRequest()->get('quantity');

        // La quantità è maggiore di zero?
        if ($quantity < 0) {
            $return['message'] = 'I Mori da depositare devono essere maggiori di 0';

            return new JsonResponse($return);
        }

        // Sto depositando troppi Mori?
        if ($quantity > $personage->getBagAmount()) {
            $return['message'] = 'La quantità da trasferire supera la disponibilità attuale del conto.';

            return new JsonResponse($return);
        }

        // Ok, posso fare il deposito.
        $newBagAmount = $personage->getBagAmount() - $quantity;
        $newBankAmount = $personage->getBankAmount() + $quantity;

        $personage->setBagAmount($newBagAmount);
        $personage->setBankAmount($newBankAmount);

        $transactionDeposit = $em->getRepository('GdrGameBundle:TransactionType')->findOneBy(
            array('id' => TransactionType::DEPOSITO)
        );

        $destTransaction = new Transaction();
        $destTransaction->setType($transactionDeposit);
        $destTransaction->setAmount($quantity);
        $destTransaction->setSubject($personage);
        $destTransaction->setIsPlus(true);
        $destTransaction->setNote("Avete depositato dei fondi.");

        $em->persist($personage);
        $em->persist($destTransaction);
        $em->flush();

        $return['response'] = true;
        $return['message'] = 'Il deposito è stato eseguito.';
        $return['bankAmount'] = $newBankAmount;
        $return['bagAmount'] = $newBagAmount;
        return new JsonResponse($return);
    }

    /**
     * Elimina le transazioni più vecchie.
     */
    public function cleanOldestAction()
    {
        // TODO: limite di 100 record per le transazioni

        $total = $this->getDoctrine()->getManager()
            ->getRepository('GdrGameBundle:Transaction')
            ->findAllByPersonage($this->getPersonage());

        var_dump($total);
    }
}