<?php

namespace Gdr\AvatarBundle\Controller;

use Doctrine\ORM\EntityNotFoundException;
use Gdr\GameBundle\Entity\Transaction;
use Gdr\GameBundle\Entity\TransactionType;
use Gdr\ItemsBundle\Entity\Inventory;
use Gdr\ItemsBundle\Entity\ItemType;
use Gdr\UserBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class InventoryController extends Controller
{
    const PRICE_SEND_ITEM = 200;

    /**
     * Visualizza le categorie degli oggetti (vestiti esclusi).
     *
     * @param $name
     *
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws EntityNotFoundException
     */
    public function indexAction($name)
    {
        $personage = $this->checkIfValidName($name);

        $isOwner = $this->getPersonage()->getName() == $name || $this->getPermission()->isAdmin();

        $categories = $this->getDoctrine()
            ->getRepository('GdrItemsBundle:Inventory')
            ->findCategoriesForInventory($personage->getId(), $isOwner);

        if (null === $categories) {
            throw new EntityNotFoundException('Non ci sono categorie.');
        }

        return $this->render(
            'GdrAvatarBundle:Inventory:index.html.twig',
            array(
                'categories' => $categories,
                'name' => $personage->getName(),
                'upload_path' => $this->container->getParameter('item_upload_path') . '/'
            )
        );
    }

    /**
     * @param $name
     * @param $category
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function itemsAction($name, $category)
    {
        $personage = $this->checkIfValidName($name);

        $is_owner = $personage == $this->getPersonage() ? true : false;

        // Posso vedere gli oggetti invisibili solo se sono il proprietario.
        $can_view_invisibles = $is_owner;

        // ...ma anche se sono admin...
        if ($is_admin = $this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            $can_view_invisibles = true;
        }

        // Recupero gli oggetti per la categoria scelta.
        $items = $this->getDoctrine()
            ->getRepository('GdrItemsBundle:Inventory')
            ->getQueryItemsByPersonageAndCategory($personage->getId(), $category, $can_view_invisibles);

        $count = count($items->getResult());
        $items = $items->setHint('knp_paginator.count', $count);

        $paginator = $this->get('knp_paginator')->paginate(
            $items,
            $this->getRequest()->query->get('page', 1),
            15,
            array('distinct' => false)
        );

        return $this->render(
            'GdrAvatarBundle:Inventory:items.html.twig',
            array(
                'paginator' => $paginator,
                'name' => $name,
                'is_owner' => $is_owner,
                'category' => $this->getDoctrine()->getRepository('GdrItemsBundle:ItemType')->find($category),
                'upload_path' => $this->container->getParameter('item_upload_path') . '/',
                'need_paginator' => $count > 15
            )
        );
    }

    /**
     * @param $id
     *
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Doctrine\ORM\EntityNotFoundException
     */
    public function showItemAction($id)
    {
        $inventory = $this->getDoctrine()->getRepository('GdrItemsBundle:Inventory')
            ->findOneBy(
                array(
                    'id' => $id
                )
            );

        if (null === $inventory) {
            throw new EntityNotFoundException('Item non trovato.');
        }

        $item = $inventory->getItem();

        return $this->render(
            'GdrAvatarBundle:Inventory:item.html.twig',
            array(
                'item' => $item
            )
        );
    }

    /**
     * @param $id
     *
     * @return JsonResponse
     * @throws \Doctrine\ORM\EntityNotFoundException
     * @throws \Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException
     */
    public function changeVisibilityAction($id)
    {
        $inventory = $this->getDoctrine()
            ->getRepository('GdrItemsBundle:Inventory')
            ->findOneBy(array('id' => $id, 'personage' => $this->getPersonage()));

        if (null === $inventory) {
            throw new EntityNotFoundException('Inventory non vadlido.');
        }

        $new_value = $inventory->getIsInvisible() ? false : true;

        // Se è un vestito ed è indossato, non posso cambiare la visibilità.
        if ($inventory->getIsDressed()) {
            throw new AccessDeniedHttpException();
        }

        $inventory->setIsInvisible($new_value);
        $em = $this->getDoctrine()->getManager();
        $em->persist($inventory);
        $em->flush();

        return new JsonResponse(array('value' => $new_value));
    }

    /**
     * @param $id
     *
     * @return JsonResponse
     * @throws \Doctrine\ORM\EntityNotFoundException
     * @throws \Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException
     */
    public function changeEquippedAction($id)
    {
        $inventory = $this->getDoctrine()
            ->getRepository('GdrItemsBundle:Inventory')
            ->findOneBy(array('id' => $id, 'personage' => $this->getPersonage()));

        if (null === $inventory) {
            throw new EntityNotFoundException();
        }

        // Deve poter essere trasportabile.
        if (false === $inventory->getItem()->getIsTransportable()) {
            throw new AccessDeniedHttpException();
        }

        // Non posso eseguire questa azione se sono in gioco.
        if (false === $this->canUseInventory()) {

            if (new \DateTime() <= $date = $this->getPersonage()->getOnline()->getInventoryBlockedUntil()) {
                $date = $date->format('d/m/Y H:i');
                $msg = "<p><strong>Attenzione:</strong> non potete equipaggiare questo oggetto fino al " . $date . "</p>";
            } else {
                $msg = "<p><strong>Attenzione:</strong> non potete equipaggiare questo oggetto finché siete in gioco.</p>";
            }

            return new JsonResponse(array(
                'response' => false,
                'value' => $inventory->getIsEquipped(),
                'message' => $msg
            ));
        }

        // Non deve superare il limite di trasporto.
        if (false == $inventory->getIsEquipped()
            && false === $this->checkTotalWeight($inventory->getItem())
        ) {
            return new JsonResponse(array(
                'response' => false,
                'value' => false,
                'message' => "<p><strong>Attenzione:</strong> non potete equipaggiare questo oggetto poiché superereste il limite di peso/ingombro di " . Inventory::BAG_LIMIT . ".</p>"
            ));
        }

        // Se è Indosso, devo restituire un errore.
        if ($inventory->getIsDressed()) {
            return new JsonResponse(array(
                'response' => false,
                'value' => true, // True per preservare il "tick"
                'message' => "<p><strong>Attenzione:</strong> dovete indossare qualcos'altro prima di rimuovere della borsa questo vestito.</p>"
            ));
        }

        // Se è mutanda, non posso.
        if ($inventory->getItem()->getName() == "In Mutande") {
            return new JsonResponse(array(
                'response' => false,
                'value' => true, // True per preservare il "tick"
                'message' => "<p><strong>Attenzione:</strong> non puoi rimuovere dalla borsa questo oggetto.</p>"
            ));
        }

        $new_value = $inventory->getIsEquipped() ? false : true;

        $inventory->setIsEquipped($new_value);
        $em = $this->getDoctrine()->getManager();
        $em->persist($inventory);
        $em->flush();

        // Recupero il peso della borsa.
        $totalWeight = $this->getDoctrine()
            ->getRepository('GdrItemsBundle:Inventory')
            ->getTotalBagWeight($this->getPersonage()->getId());

        return new JsonResponse(array(
                'response' => true,
                'value' => $new_value,
                'totalWeight' => $totalWeight
            )
        );
    }

    /**
     * @param $id
     *
     * @return JsonResponse
     * @throws \Doctrine\ORM\EntityNotFoundException
     * @throws \Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException
     */
    public function sellItemAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $personage = $this->getPersonage();

        $inventory = $em
            ->getRepository('GdrItemsBundle:Inventory')
            ->findOneBy(array('id' => $id, 'personage' => $personage));

        if (null === $inventory) {
            throw new EntityNotFoundException('Inventory non vadlido.');
        }

        // Recupero l'oggetto.
        $item = $inventory->getItem();

        if (false == $item->getIsResalable()) {
            throw new AccessDeniedHttpException('Non vendibile.');
        }

        // Ok, posso venderlo. Devo recuperare il prezzo, aggiungere i soldi alla mia banca, aumentare la quantità di
        // quello presente al mercato. E salvare la transazione.
        $price = ceil($item->getPrice() / 2);
        $item->setQuantity($item->getQuantity() + 1);
        $personage->setBankAmount($personage->getBankAmount() + $price);

        $transaction = new Transaction();
        $transaction_type = $em->getRepository('GdrGameBundle:TransactionType')
            ->findOneBy(array('id' => TransactionType::MARKET));

        $transaction->setType($transaction_type);
        $transaction->setIsPlus(true);
        $transaction->setAmount($price);
        $transaction->setSubject($personage);
        $transaction->setNote("Avete venduto un'unità di {$item->getName()}");

        $em->persist($transaction);
        $em->persist($item);
        $em->remove($inventory);
        $em->flush();

        return new JsonResponse(array(
            'response' => true,
            'message' => "<p>La transazione è andata a buon fine. Avete venduto l'oggetto per un totale di {$price} Mori.</p>"
        ));
    }

    /**
     * @param $id
     *
     * @return JsonResponse
     * @throws \Doctrine\ORM\EntityNotFoundException
     * @throws \Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException
     */
    public function deleteItemAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $personage = $this->getPersonage();

        $inventory = $em
            ->getRepository('GdrItemsBundle:Inventory')
            ->findOneBy(array('id' => $id));

        if (null === $inventory) {
            throw new EntityNotFoundException('Inventory non valido.');
        }

        // Non posso eseguire questa azione se sono in gioco.
        if (false === $this->canUseInventory()) {

            if (new \DateTime() <= $date = $this->getPersonage()->getOnline()->getInventoryBlockedUntil()) {
                $date = $date->format('d/m/Y H:i');
                $msg = "<p><strong>Attenzione:</strong> non potete distruggere questo oggetto fino al " . $date . "</p>";
            } else {
                $msg = "<p><strong>Attenzione:</strong> non potete distruggere questo oggetto finché siete in gioco.</p>";
            }

            return new JsonResponse(array(
                'response' => false,
                'value' => $inventory->getIsEquipped(),
                'message' => $msg
            ));
        }

        // Posso cancellare se sono owner e c'è la specifica, oppure sempre se sono admin.
        $is_owner = $inventory->getPersonage() == $personage;
        $is_destructible = $inventory->getItem()->getIsDestructible();

        if (($is_owner && $is_destructible) || $this->get('security.context')->isGranted('ROLE_ADMIN')) {
            // Se è un vestito, metto le Mutande di default.
            // TODO: Se è libro incantesimo, ELIMINO QUELLI IN GRIMORIO
            if ($inventory->getIsDressed()) {
                $mutande = $em
                    ->getRepository('GdrItemsBundle:Item')
                    ->findOneBy(array('name' => Inventory::MUTANDE));

                if (null === $mutande) {
                    throw new EntityNotFoundException('Non esiste nessuna mutanda.');
                }

                $miaMutanda = $em
                    ->getRepository('GdrItemsBundle:Inventory')
                    ->findOneBy(array('item' => $mutande, 'personage' => $personage));

                if (null === $mutande) {
                    throw new EntityNotFoundException('Non possiedo nessuna mutanda.');
                }

                $miaMutanda->setIsDressed(true);
                $miaMutanda->setIsInvisible(false);
                $em->persist($miaMutanda);
            }

            $em->remove($inventory);

            // Se è una missiva la cancello sul serio.
            if ($inventory->getItem()->getLetter()) {
                $em->remove($inventory->getItem());
            }

            $em->flush();
        } else {
            throw new AccessDeniedHttpException('Non puoi eseguire questa azione.');
        }

        return new JsonResponse(array(
            'response' => true,
            'message' => "<p>L'oggetto è stato distrutto.</p>"
        ));
    }

    public function sendItemAction($id = null, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $personage = $this->getPersonage();

        $inventory = $em
            ->getRepository('GdrItemsBundle:Inventory')
            ->findOneBy(array('id' => $id, 'personage' => $personage));

        if (null === $inventory) {
            throw new EntityNotFoundException('Inventory non valido/proprio.');
        }

        $form = $this->createFormBuilder(null, array('csrf_protection' => false))
            ->add('destinatario', 'name_selector')
            ->getForm();

        $item = $inventory->getItem();

        if ($item->getPrice() <= 1000) {
            $prezzo = 100;
        } else {
            $peso = $item->getWeight() ? $item->getWeight() : 1;
            $prezzo = ceil(100 + (($item->getPrice() * $peso) / 50));
        }

        $form->handleRequest($request);

        if ($request->isMethod('post') && $form->isValid()) {
            $destinatario = $form->get('destinatario')->getData();

            // Non posso eseguire questa azione se sono in gioco E l'oggetto è in borsa.
            if (false === $this->canUseInventory() && $inventory->getIsEquipped()) {

                if (new \DateTime() <= $date = $this->getPersonage()->getOnline()->getInventoryBlockedUntil()) {
                    $date = $date->format('d/m/Y H:i');
                    $msg = "<p><strong>Attenzione:</strong> non puoi far recapitare questo oggetto fino al " . $date . "</p>";
                } else {
                    $msg = "<p><strong>Attenzione:</strong> non puoi far recapitare questo oggetto finché sei in gioco.</p>";
                }

                return new JsonResponse(array(
                    'response' => false,
                    'message' => $msg
                ));
            }

            // Ho abbastanza soldi?
            if ($personage->getBankAmount() < $prezzo) {
                return new JsonResponse(array(
                    'response' => false,
                    'message' => "<p>Non hai abbastanza Mori in banca per concludere questa operazione.</p>"
                ));
            }

            $personage->setBankAmount($personage->getBankAmount() - self::PRICE_SEND_ITEM);
            $inventory->setIsEquipped(false);
            $inventory->setPersonage($destinatario);

            $general = $this->get('gdr.game_bundle.general');
            $msg = "<p>Un lavorante vi ha consegnato 1x <strong>" . $inventory->getItem()->getName(
                ) . "</strong> da parte di <strong>" . $personage->getName() . "</strong></p>";
            $sl = $general->createSystemLetter($msg, $destinatario->getId(), "Sistema");

            $em->persist($personage);
            $em->persist($inventory);
            $em->flush();

            $log = $this->get('gdr.banklogger');
            $log->log(
                $prezzo,
                null,
                $this->getPersonage(),
                "Avete spedito 1x " . $inventory->getItem()->getName() . " a " . $destinatario->getName(),
                TransactionType::MARKET,
                false
            );

            return new JsonResponse(array(
                'response' => true,
                'message' => "<p>I Vostri beni sono in viaggio e saranno recapitati al destinatario tra poco.</p>",
                'id' => $inventory->getId()
            ));

        } elseif ($request->isMethod('post') && !$form->isValid()) {
            return new JsonResponse(array(
                'response' => false,
                'message' => "<p><strong>Il destinatario inserito non esiste. Riprova.</strong></p>",
            ));
        }

        return $this->render(
            '@GdrAvatar/Inventory/sendItem.html.twig',
            array(
                'form' => $form->createView(),
                'price' => $prezzo,
                'url' => $this->generateUrl('avatar-item-send', array('id' => $id))
            )
        );
    }

    /**
     * @param $id
     *
     * @return JsonResponse
     * @throws \Doctrine\ORM\EntityNotFoundException
     * @throws \Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException
     */
    public function changeDressAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $inventory = $this->getDoctrine()
            ->getRepository('GdrItemsBundle:Inventory')
            ->findOneBy(array('id' => $id, 'personage' => $this->getPersonage()));

        // Se l'oggetto non esiste oppure non è un vestito...
        if (null === $inventory || $inventory->getItem()->getType()->getName() != ItemType::VESTITI) {
            throw new EntityNotFoundException();
        }

        // Se sono in gioco posso indossare soltanto ciò che è già in borsa.
        if ($this->isInGame()) {
            return new JsonResponse(array(
                'response' => false,
                'message' => "<p><strong>Attenzione:</strong> per indossare un vestito mentre giochi devi usare la borsa rapida.</p>"
            ));
        }

        // Non posso equipaggiare se supera il peso massimo...
        if (false === $inventory->getIsEquipped() && false === $this->checkTotalWeight($inventory->getItem())) {
            return new JsonResponse(array(
                'response' => false,
                'message' => "<p><strong>Attenzione:</strong> non potete equipaggiare questo oggetto poiché superereste il limite di peso/ingombro di " . Inventory::BAG_LIMIT . ".</p>"
            ));
        }

        // Recupero qualsiasi oggetto mio che abbia dress=true e lo imposto a false
        $itemsDressed = $this->getDoctrine()
            ->getRepository('GdrItemsBundle:Inventory')
            ->findBy(array('isDressed' => true, 'personage' => $this->getPersonage()));

        foreach ($itemsDressed as $i) {
            $i->setIsDressed(false);
            $em->persist($i);
        }

        $em->flush();

        // Imposto il mio vestito su "indossato" e "in borsa".
        $inventory->setIsDressed(true);
        $inventory->setIsEquipped(true);
        // Se lo indosso non può essere invisibile.
        $inventory->setIsInvisible(false);

        $em->persist($inventory);
        $em->flush();

        return new JsonResponse(
            array(
                'response' => true
            )
        );
    }

    /**
     * @param $name
     *
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Doctrine\ORM\EntityNotFoundException
     */
    public function dressListAction($name)
    {
        $personage = $this->checkIfValidName($name);

        $is_owner = $personage == $this->getPersonage() ? true : false;

        // Posso vedere gli oggetti invisibili solo se sono il proprietario.
        $can_view_invisibles = $is_owner;

        // ...ma anche se sono admin...
        if ($is_admin = $this->get('security.context')->isGranted('ROLE_ADMIN')) {
            $can_view_invisibles = true;
        }

        $category_dress = $this->getDoctrine()->getRepository('GdrItemsBundle:ItemType')
            ->findOneBy(array('name' => ItemType::VESTITI));

        if (null === $category_dress) {
            throw new EntityNotFoundException();
        }

        // Recupero gli oggetti per il mercato corrente.
        $items = $this->getDoctrine()
            ->getRepository('GdrItemsBundle:Inventory')
            ->getQueryItemsByPersonageAndCategory($personage->getId(), $category_dress->getId(), $can_view_invisibles);

        $count = count($items->getResult());
        $items = $items->setHint('knp_paginator.count', $count);

        $paginator = $this->get('knp_paginator')->paginate(
            $items,
            $this->getRequest()->query->get('page', 1),
            15,
            array('distinct' => false)
        );

        return $this->render(
            'GdrAvatarBundle:Inventory:dress.html.twig',
            array(
                'paginator' => $paginator,
                'name' => $name,
                'is_owner' => $is_owner,
                'upload_path' => $this->container->getParameter('item_upload_path') . '/'
            )
        );
    }

    public function bagListAction($name = null)
    {
        if (null === $name) {
            $personage = $this->getPersonage();
        } else {
            $personage = $this->checkIfValidName($name);
        }

        $is_owner = $personage == $this->getPersonage() ? true : false;

        // Posso vedere gli oggetti invisibili solo se sono il proprietario.
        $can_view_invisibles = $is_owner;

        // ...ma anche se sono admin...
        if ($is_admin = $this->get('security.context')->isGranted('ROLE_ADMIN')) {
            $can_view_invisibles = true;
        }

        $itemsInBag = $this->getDoctrine()
            ->getRepository('GdrItemsBundle:Inventory')
            ->getInBagItems($personage->getId(), $can_view_invisibles);

        $WeightInBag = $this->getDoctrine()
            ->getRepository('GdrItemsBundle:Inventory')
            ->getTotalBagWeight($personage->getId());

        return $this->render(
            'GdrAvatarBundle:Inventory:bag.html.twig',
            array(
                'items' => $itemsInBag,
                'is_owner' => $is_owner,
                'personage' => $personage,
                'categoryVestiti' => ItemType::VESTITI,
                'totalItems' => count($itemsInBag),
                'totalWeight' => $WeightInBag,
                'upload_path' => $this->container->getParameter('item_upload_path') . '/',
                'bag_limit' => Inventory::BAG_LIMIT
            )
        );

    }

    public function miniBagAction()
    {
        $personage = $this->getPersonage();

        $itemsInBag = $this->getDoctrine()
            ->getRepository('GdrItemsBundle:Inventory')
            ->getInBagItems($personage->getId(), true);

        return $this->render(
            'GdrAvatarBundle:Inventory:bagMini.html.twig',
            array(
                'inventories' => $itemsInBag,
                'vestito' => ItemType::VESTITI,
                'isInGame' => $personage->getOnline()->getIsInGame(),
                'canView' => $this->getPersonage()->getIsDead() ? false : true
            )
        );
    }

    /**
     * @param $name
     *
     * @return \Gdr\UserBundle\Entity\Personage
     * @throws \Doctrine\ORM\EntityNotFoundException
     */
    protected function checkIfValidName($name)
    {
        $personage = $this->getDoctrine()
            ->getRepository('GdrUserBundle:Personage')
            ->findOneBy(array('name' => $name));

        if (null === $personage) {
            throw new EntityNotFoundException();
        }

        return $personage;
    }

    /**
     * @param $item
     *
     * @return bool
     */
    protected function checkTotalWeight($item)
    {
        $totalWeight = $this->getDoctrine()
            ->getRepository('GdrItemsBundle:Inventory')
            ->getTotalBagWeight($this->getPersonage()->getId());

        $itemWeight = $item->getWeight();

        if ($totalWeight + $itemWeight > Inventory::BAG_LIMIT) {
            return false;
        }

        return true;
    }

    /**
     * @return bool
     */
    protected function canUseInventory()
    {
        $online = $this->getPersonage()->getOnline();

        if ($online->getIsInGame() || new \DateTime() < $online->getInventoryBlockedUntil()) {
            return false;
        } else {
            return true;
        }
    }
}