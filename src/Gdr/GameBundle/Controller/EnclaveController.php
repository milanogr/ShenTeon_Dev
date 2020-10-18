<?php

namespace Gdr\GameBundle\Controller;

use Doctrine\ORM\EntityNotFoundException;
use Gdr\UserBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class EnclaveController extends Controller
{
    public function indexAction()
    {
        $categoriesEnclave = $this->getDoctrine()->getRepository('GdrGameBundle:EnclaveCategory')
            ->getCategoriesWithEnclave();

        $categoriesClan = $this->getDoctrine()->getRepository('GdrGameBundle:EnclaveCategory')
            ->getCategoriesWithClan();

        $categoriesUnofficial = $this->getDoctrine()->getRepository('GdrGameBundle:EnclaveCategory')
            ->getCategoriesWithEnclaveUnofficial();


        return $this->render(
            'GdrGameBundle:Enclave:index.html.twig',
            array(
                'categoriesEnclave' => $categoriesEnclave,
                'categoriesClan' => $categoriesClan,
                'categoriesUnofficial' => $categoriesUnofficial
            )
        );
    }

    public function showAction($id)
    {
        $enclave = $this->getDoctrine()->getRepository('GdrGameBundle:Enclave')
            ->getListForEnclave($id);

        if (null === $enclave) {
            throw new EntityNotFoundException();
        }

        $hasEnclave = $this->getPersonage()->hasEnclave();
        $hasClan = $this->getPersonage()->hasClan();

        $isMyEnclave =
            ($hasEnclave && $hasEnclave->getId() == $id)
            || ($hasClan && $hasClan->getId() == $id)
            || $this->getPermission()->isAdmin();

        return $this->render(
            'GdrGameBundle:Enclave:show.html.twig',
            array(
                'enclave' => $enclave,
                'isMyEnclave' => $isMyEnclave
            )
        );
    }

    public function showStatuteAction($id)
    {
        $enclave = $this->getDoctrine()->getRepository('GdrGameBundle:Enclave')
            ->findOneBy(array('id' => $id, 'isActive' => true));

        if (null === $enclave) {
            throw new EntityNotFoundException();
        }

        return new Response($enclave->getStatute());
    }

    public function showAnnexAction($id)
    {
        $enclave = $this->getDoctrine()->getRepository('GdrGameBundle:Enclave')
            ->findOneBy(array('id' => $id, 'isActive' => true));

        if (null === $enclave) {
            throw new EntityNotFoundException();
        }

        return new Response($enclave->getAnnex());
    }

    public function showNobiliAction()
    {
        $enclaveNobili = $this->getDoctrine()->getRepository('GdrGameBundle:Enclave')
            ->findOneBy(array('isNobili' => true));

        $nobili = $this->getDoctrine()->getRepository('GdrUserBundle:Title')
            ->getAllNobles();

        return $this->render(
            'GdrGameBundle:Enclave:showNobili.html.twig',
            array(
                'enclave' => $enclaveNobili,
                "nobili" => $nobili
            )
        );
    }

    public function showShieldsAction($id, $isClan = false, $notOfficial = false)
    {
        $enclavi = $this->getDoctrine()->getRepository('GdrGameBundle:Enclave')
            ->findBy(array(
                    'category' => $id,
                    'isClan' => $isClan,
                    'notOfficial' => $notOfficial,
                    'isActive' => true,
                ));

        return $this->render(
            'GdrGameBundle:Enclave:showShields.html.twig',
            [
                'enclavi' => $enclavi
            ]
        );
    }
}