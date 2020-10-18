<?php

namespace Gdr\GameBundle\Controller;

use Doctrine\ORM\EntityNotFoundException;
use Gdr\GameBundle\Entity\Location;
use Gdr\GameBundle\Entity\Test;
use Gdr\UserBundle\Controller\Controller as BaseController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Translation\Exception\NotFoundResourceException;

class LocationController extends BaseController
{
    public $currentLocation = null;

    /**
     * @param $id
     * @param bool $ajax
     * @return JsonResponse|\Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     * @throws \ErrorException
     */
    public function changeAction($id, $ajax = false)
    {
        // Verifico l'esistenza della nuova posizione
        $location = $this->getDoctrine()->getRepository('GdrGameBundle:Location')->find($id);

        if (!$location) {
            $this->get('logger')
                ->error(
                    "Personaggio ($this->getPersonage()->getId()) ha provato ad accedere ad una location ({$id}) non esistente."
                );

            return $this->createNotFoundException(
                'La posizione non esiste.'
            );
        }

        if ($ajax) {
            $return = array("response" => true);
        } else {
            $url = null;
        }

        $savePosition = false;

        switch ($location->getType()) {
            case $location::TYPE_MAP:
                $url = $this->generateUrl('location_map');
                $savePosition = true;
                break;

            case $location::TYPE_TEON:
            case $location::TYPE_TEON_UNDER:

                $online = $this->getPersonage()->getOnline();
                $url = $this->generateUrl('locations_map', array('id' => $location->getId()));

                if ($online->getIsInGame()) {
                    $savePosition = false;
                } else {
                    $savePosition = true;
                }

                break;

            case $location::TYPE_CHAT || $location::TYPE_HOUSE:

                $online = $this->getPersonage()->getOnline();

                $isSubChat = false;

                if (null !== $online->getLocation()->getSubChat()) {
                    $subChat = $online->getLocation()->getSubChat();
                    $isSubChat = $location == $subChat;
                }

                // Non posso cambiare chat solo se non è una sub.
                if ($online->getIsInGame() && $online->getLocation() != $location && false === $isSubChat) {
                    $savePosition = false;
                    if ($ajax) {
                        $return['response'] = false;
                        $return['url'] = false;
                        $return['msg'] = "Non puoi entrare in un'altra chat mentre sei in gioco.";
                    } else {
                        $url = $this->generateUrl('chat-index');
                    }
                    break;
                }

                // Chat chiusa sempre bloccata.
                if ($location->getIsClosed()) {
                    $savePosition = false;
                    if ($ajax) {
                        $return['response'] = false;
                        $return['url'] = false;
                        $return['msg'] = "<div class='text-centered'><img src='/bundles/gdrgame/images/popup/no-access.png'> <br><br> Non è possibile entrare in questa chat.</div>";
                    } else {
                        $url = $this->getRequest()->headers->get('referer');
                    }
                    break;
                }

                // Chat di Enclave richiede chiave o appartenenza.
                if (false === $this->canViewChat($location)) {
                    $savePosition = false;
                    if ($ajax) {
                        $return['response'] = false;
                        $return['url'] = false;
                        $return['msg'] = "<div class='text-centered'><img src='/bundles/gdrgame/images/popup/no-access.png'> <br><br> Non puoi entrare in questa chat senza la chiave giusta!</div>";
                    } else {
                        return $this->render("GdrGameBundle:Chat:no-accesso.html.twig");
                    }
                } else {
                    $savePosition = true;
                    $url = $this->generateUrl('chat-index');

                    if ($ajax) {
                        $return['url'] = $url;
                    }
                }

                break;

            default:
                throw new \ErrorException('wtf');
                break;
        }

        if (true === $savePosition) {
            // Salvo nel database ed in sessione la nuova posizione.
            $online = $this->getPersonage()->getOnline()->setLocation($location);

            $em = $this->getDoctrine()->getManager();
            $em->persist($online);
            $em->flush();

            // Salvo in sessione.
            $this->getRequest()->getSession()->set('current_location', $location->getId());
        }

        if ($ajax) {
            return new JsonResponse($return);
        } else {
            return $this->redirect($url);
        }
    }

    public function renderLocationAction()
    {
        $isDay = $this->get('gdr.game_bundle.general')->isDay();
        $location = $this->getCurrentLocation();

        if ($property = $location->getProperty()) {
            $image = $property;
            $isProperty = true;
        } else {
            $condition = $this->getDoctrine()->getRepository('GdrMeteoBundle:MeteoStatus')
                ->findOneBy(array());

            $image = $this->getDoctrine()->getRepository('GdrGameBundle:LocationImage')
                ->findOneBy(
                    array(
                        "location" => $location,
                        "condition" => $condition->getCondition(),
                        "forNight" => !$isDay
                    )
                );
            $isProperty = false;
        }

        return $this->render(
            'GdrGameBundle:Default:location.html.twig',
            array(
                'location' => $location,
                'image' => $image,
                'isProperty' => $isProperty
            )
        );
    }

    /**
     * Resitutisce le informazioni da visualizzare nel popup della location corrente.
     *
     * @return Response
     */
    public function renderLocationInfosAction()
    {
        $location = $this->getCurrentLocation();

        return $this->render(
            'GdrGameBundle:Location:popup.html.twig',
            array(
                'location' => $location
            )
        );
    }

    public function renderDescriptionMapAction()
    {
        $location = $this->getCurrentLocation();

        return $this->render(
            'GdrGameBundle:Location:popupDescriptionAction.html.twig',
            array(
                'location' => $location
            )
        );
    }

    /**
     * Restituisce l'eventuale link per tornare alla location.
     */
    public function renderGoBackAction()
    {
        $location = $this->getCurrentLocation();
        $defaultText = "indietro";
        $link = null;

        switch ($location->getType()) {
            case $location::TYPE_MAP:
                if ($this->getPersonage()->getOnline()->getIsInGame()) {
                    $link = $this->generateUrl('chat-index');
                    $defaultText = "alla chat";
                } else {
                    $link = null;
                }
                break;

            case $location::TYPE_CHAT:
            case $location::TYPE_HOUSE:
                $link = $this->generateUrl('chat-index');
                $defaultText = "alla chat";
                break;

            case $location::TYPE_TEON:
            case $location::TYPE_TEON_UNDER:
                $link = $this->generateUrl('location_map');
                $defaultText = "alla mappa";
                break;

            default:
                $link = $this->generateUrl('location_map');
                $defaultText = "alla mappa";
                break;
        }

        if (null === $link) {
            return new Response("");
        }

        return new Response("<a class='button-primary' href='{$link}'>← Torna {$defaultText}</a>");
    }

    /**
     * Restituisce la vista della mappa.
     */
    public function mapAction()
    {
        // Recupero tutte le locations.
        $teon = $this->getDoctrine()->getRepository('GdrGameBundle:Location')
            ->findOneBy(
                array("name" => "Mappa di Teon")
            );

        $teonUnder = $this->getDoctrine()->getRepository('GdrGameBundle:Location')
            ->findOneBy(
                array("name" => "Mappa della Signoria di Teon")
            );

        $locations = $this->getDoctrine()->getRepository('GdrGameBundle:Location')
            ->getLocationsForDropdown();

        return $this->render(
            'GdrGameBundle:Location:map.html.twig',
            array(
                'teon' => $teon,
                'teonUnder' => $teonUnder,
                'locations' => $locations,
                'isDay' => $this->get('gdr.game_bundle.general')->isDay()
            )
        );
    }

    /**
     * Visualizza la mappa e le location della stessa.
     */
    public function showMapAndLocationsAction($id)
    {
        $map = $this->getDoctrine()->getRepository('GdrGameBundle:Location')->find($id);

        if (null === $map) {
            throw new EntityNotFoundException();
        }

        $locations = $this->getDoctrine()->getRepository('GdrGameBundle:Location')
            ->findBy(array(
                'parentMap' => $map,
                'isActive' => true,
            ));

        $activeLocations = $this->getDoctrine()
            ->getRepository('GdrUserBundle:Online')
            ->getActiveLocations();

        $al = [];

        foreach ($activeLocations as $location){
            $al[] = $location['id'];
        }

        return $this->render(
            'GdrGameBundle:Location:mapAndLocations.html.twig',
            array(
                'map' => $map,
                'locations' => $locations,
                'isDay' => $this->get('gdr.game_bundle.general')->isDay(),
                'activeLocations' => $al
            )
        );
    }

    protected function canViewChat(Location $location)
    {
        $pg = $this->getPersonage();

        // PassPartout per gli admin
        if ($this->getPermission()->isAdmin()) {
            return true;
        }

        if ($location->getRequireKey()) {
            // Se è di Enclave devo farne parte.
            if (null !== $location->getEnclave()) {
                if ($pg->hasEnclave() == $location->getEnclave() || $pg->hasClan() == $location->getEnclave()) {
                    return true;
                }
            }

            // Altrimenti mi serve la chiave.
            return $this->getPermission()->hasKey($location);
        }

        return true;
    }
}