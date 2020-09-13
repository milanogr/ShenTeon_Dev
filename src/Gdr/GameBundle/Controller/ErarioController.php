<?php

namespace Gdr\GameBundle\Controller;

use Doctrine\ORM\EntityNotFoundException;
use Gdr\GameBundle\Entity\Transaction;
use Gdr\GameBundle\Entity\TransactionType;
use Gdr\ItemsBundle\Entity\InventoryProperty;
use Gdr\ItemsBundle\Entity\Property;
use Gdr\UserBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class ErarioController extends Controller
{
    public function indexAction($type = Property::TYPE_HOUSE)
    {
        $propertys = $this->getDoctrine()
            ->getRepository('GdrItemsBundle:Property')
            ->getAllByType($type);

        $paginator = $this->get('knp_paginator')->paginate($propertys, $this->getRequest()->query->get('page', 1), 15);


        return $this->render(
            'GdrGameBundle:Erario:index.html.twig',
            array(
                'types' => Property::getTypes(),
                'currentType' => (int)$type,
                'paginator' => $paginator,
            )
        );
    }

    public function buyAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        // Risposta di default.
        $return = array(
            'response' => false,
            'message' => false,
            'bankAmount' => null
        );

        // Recupero l'oggetto.
        $property = $this->getDoctrine()->getRepository('GdrItemsBundle:Property')
            ->findOneBy(array('id' => $id, 'isActive' => true));

        if (null === $property) {
            $return['error'] = "Attenzione: l'immobile è stato tolto dal mercato prima che tu potessi concludere l'acquisto.";

            return new JsonResponse($return);
        }

        // La quantità selezionata è superiore a quella presente sul mercato?
        if ($property->getOwner()) {
            $return['message'] = 'Attenzione: l\'immobile non è più disponibile sul mercato.';

            return new JsonResponse($return);
        }

        $personage = $this->getPersonage();

        // Posso permettermi l'acquisto?
        if ($personage->getBankAmount() < $property->getPrice()) {
            $return['message'] = "Non disponi dei Mori sufficienti per effettuare l'acquisto. Il tuo conto ammonta a {$this->getPersonage(
            )->getBankAmount()} Mori.";

            return new JsonResponse($return);
        }

        // Bene, inizio la procedura d'acquisto. Sottraggo il totale dal conto bancario.
        $newCountValue = $personage->getBankAmount() - $property->getPrice();
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
        $transaction->setAmount($property->getPrice());
        $transaction->setType($transactionType);
        $note = "Hai acquistato all'erario {$property->getName()}.";
        $transaction->setNote($note);

        $property->setOwner($personage);

        // Se non è una casa, devo inserire la prossima produzione.
        if ($property->getType() != Property::TYPE_HOUSE){
            $property->setNextTaxAt(new \DateTime("next month + 7 days"));

            $days = $property->getFrequencyItems();
            $date = new \DateTime("+{$days} days");
            $property->setNextProductionAt($date);
        }

        // Eseguo l'effettivo aggiornamento che mi toglie i soldi dal conto, inserisce la transazione ed aggiorna la quantità
        // dell'Item al mercato.
        $em->persist($personage);
        $em->persist($transaction);
        $em->persist($property);
        $em->flush();

        if ($property->getType() != Property::TYPE_HOUSE){
            $message = "L'acquisto dell'immobile è andato a buon fine. Contatta la gestione per scegliere i beni personalizzati da produrre.";
        }else{
            $message = "L'acquisto dell'immobile è andato a buon fine.";
        }

        $return['response'] = true;
        $return['message'] = $message;

        return new JsonResponse($return);
    }
}