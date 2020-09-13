<?php

namespace Gdr\AvatarBundle\Controller;

use Doctrine\ORM\EntityNotFoundException;
use Gdr\GameBundle\Entity\Transaction;
use Gdr\GameBundle\Entity\TransactionType;
use Gdr\ItemsBundle\Entity\Property;
use Gdr\UserBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\Validator\Constraints\DateTime;

class PropertyController extends Controller
{
    public function indexAction($name = null)
    {
        if (null === $name) {
            $is_owner = true;
            $personage = $this->getPersonage();
        } else {
            $personage = $this->checkIfValidName($name);
            $is_owner = $personage == $this->getPersonage() ? true : false;
        }

        if (null === $personage) {
            throw new EntityNotFoundException('Personaggio non trovato con questo nome.');
        }

        $houses = $this->getDoctrine()->getRepository('GdrItemsBundle:Property')
            ->getPropertiesByPersonage($personage->getId(), 1);

        $activities = $this->getDoctrine()->getRepository('GdrItemsBundle:Property')
            ->getPropertiesByPersonage($personage->getId(), 2);

        $keys = $this->getDoctrine()->getRepository('GdrItemsBundle:Inventory')
            ->getKeysForPersonage($this->getPersonage()->getId());

        return $this->render(
            '@GdrAvatar/Property/index.html.twig',
            array(
                'is_owner' => $is_owner,
                'houses' => $houses,
                'activities' => $activities,
                'keys' => $keys,
                'personage' => $personage,
                'isInGame' => $personage->getOnline()->getIsInGame()
            )
        );
    }

    public function setAddressAction($key)
    {
        $personage = $this->getPersonage();

        // Il controllo va fatto in base al fatto di avere o meno la chiave
        $key = $this->getDoctrine()->getRepository('GdrItemsBundle:Item')
            ->find($key);

        $inventory = $this->getDoctrine()->getRepository('GdrItemsBundle:Inventory')
            ->findOneBy(
                array(
                    "item" => $key,
                    "personage" => $personage
                )
            );

        if (null === $inventory) {
            throw new AccessDeniedHttpException();
        }

        $location = $key->getCanAccessLocation();

        if (null === $location) {
            throw new AccessDeniedHttpException();
        }

        $response = array();

        if ($this->getPersonage()->getAddress() == $location) {
            $personage->setAddress(null);
            $response['checkbox'] = false;
        } else {
            $personage->setAddress($location);
            $response['checkbox'] = true;
        }

        $em = $this->getDoctrine()->getManager();
        $em->persist($personage);
        $em->flush();

        return new JsonResponse($response);
    }

    /**
     * @param $id
     *
     * @return JsonResponse
     */
    public function sellAction($id)
    {
        $servizio = $this->get('gdr.erario');
        $property = $this->getDoctrine()->getRepository('GdrItemsBundle:Property')
            ->find($id);

        $servizio->sellProperty($this->getPersonage(), $property);

        $sl = $this->get("gdr.game_bundle.general")->createSystemLetter(
            "<p>La vendita è andata a buon fine ed i Mori sono stati accreditati sul Vostro conto bancario.</p>",
            $this->getPersonage()->getId(),
            "Banca"
        );

        return new JsonResponse(array(
            'response' => true
        ));
    }

    public function showProductsAction($id)
    {
        $items = $this->getDoctrine()->getRepository('GdrItemsBundle:Item')
            ->getItemsByProperty($id);

        return $this->render(
            '@GdrAvatar/Property/items.html.twig',
            array(
                'items' => $items
            )
        );
    }

    public function showKeysAction($id)
    {
        $property = $this->checkIfMine($id);

        $location = $this->getDoctrine()->getRepository("GdrGameBundle:Location")
            ->findOneBy(
                array(
                    'property' => $property
                )
            );

        $keys = $this->getDoctrine()->getRepository('GdrItemsBundle:Inventory')
            ->getPersonagesWithKey($location->getId());

        return $this->render(
            '@GdrAvatar/Property/keys.html.twig',
            array(
                'inventories' => $keys,
                'property' => $property
            )
        );
    }


    public function createKeysAction($id)
    {
        $property = $this->checkIfMine($id);

        return $this->get('gdr.erario')->createKeysForProperty($property);
    }

    public function removeKeyAction($inventoryId, $propertyId)
    {
        $property = $this->checkIfMine($propertyId);

        $inventory = $this->getDoctrine()->getRepository('GdrItemsBundle:Inventory')
            ->find($inventoryId);

        if (null === $inventory) {
            throw new EntityNotFoundException();
        }

        if ($inventory->getItem()->getCanAccessLocation()->getProperty()->getId() != $propertyId) {
            throw new AccessDeniedHttpException();
        }

        $em = $this->getDoctrine()->getManager();
        $em->remove($inventory);
        $em->flush();

        if ($inventory->getPersonage() != $this->getPersonage()) {
            $msg = "<p>Ti notifichiamo che il proprietario dell'immobile {$property->getName(
            )} ha rimosso dal tuo inventario la relativa chiave d'accesso.</p>";
            $sl = $this->get("gdr.game_bundle.general")->createSystemLetter(
                $msg,
                $inventory->getPersonage()->getId(),
                "Gestione"
            );
        }

        return new JsonResponse(array(
            "response" => true,
            "msg" => "La chiave della tua proprietà è stata rimossa dall'inventario di {$inventory->getPersonage(
            )->getName()}"
        ));
    }

    /**
     * @param $name
     *
     * @return \Gdr\UserBundle\Entity\Personage
     * @throws EntityNotFoundException
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

    protected function checkIfMine($id)
    {
        $isMine = $this->getDoctrine()->getRepository('GdrItemsBundle:Property')
            ->findOneBy(array('id' => $id, 'owner' => $this->getPersonage()->getId()));

        if (null === $isMine) {
            throw new AccessDeniedHttpException();
        }

        return $isMine;
    }
}