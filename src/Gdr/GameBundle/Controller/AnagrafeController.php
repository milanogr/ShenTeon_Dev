<?php

namespace Gdr\GameBundle\Controller;

use Gdr\UserBundle\Controller\Controller;
use Gdr\UserBundle\Entity\Online;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class OnlineController
 *
 * @package Gdr\GameBundle\Controller
 */
class AnagrafeController extends Controller
{
    public function indexAction()
    {
        $base_query = $this->getDoctrine()->getRepository("GdrUserBundle:Personage")->createQueryBuilder('p')
            ->addSelect(
                'r.name as raceName, r.maleIconName as raceMaleIcon,
                r.femaleIconName as raceFemaleIcon, s.value as surname'
            )
            ->innerJoin('p.race', 'r')
            ->leftJoin('p.surname', 's')
            ->leftJoin('GdrUserBundle:Esilio', 'e', 'WITH', 'p.user = e.banned')
            ->andWhere('e.id IS NULL')
            ->orderBy('p.name');

        $request = $this->getRequest();
        $filter = array();

        if($request->get("byLetter")){
            $filter = array(
                "byLetter" => $request->get("byLetter")
            );
            $base_query->andWhere("p.name LIKE '".$request->get("byLetter")."%'");
        }

        if($request->get("byName")){
            $filter = array(
                "byName" => $request->get("byName")
            );
            $base_query->andWhere("p.name LIKE '%".$request->get('byName')."%'");
        }

        $personages =  $base_query->getQuery();
        $count = count($personages->getResult());
        $personages = $base_query->getQuery()->setHint('knp_paginator.count', $count);

        $page = $this->getRequest()->query->get('page', 1);
        $paginator = $this->get('knp_paginator')->paginate($personages, $page, 25, array('distinct' => false));


        return $this->render(
            '@GdrGame/Anagrafe/index.html.twig',
            array(
                'paginator' => $paginator,
                'filter' => $filter,
                "typePage" => 1
            )
        );
    }

    public function divorcesAction(){
        $base_query = $this->getDoctrine()->getRepository("GdrUserBundle:Wedding")->createQueryBuilder('w')
            ->innerJoin("w.bride", "b")
            ->innerJoin("w.groom", "g")
            ->andWhere("w.isDivorced = true")
            ->orderBy("w.endedAt", "DESC");

        $request = $this->getRequest();
        $filter = array();

        if($request->get("byLetter")){
            $filter = array(
                "byLetter" => $request->get("byLetter")
            );
            $base_query->andWhere("b.name LIKE '".$request->get("byLetter")."%' OR g.name LIKE '".$request->get('byLetter')."%'");
        }

        if($request->get("byName")){
            $filter = array(
                "byName" => $request->get("byName")
            );
            $base_query->andWhere("b.name LIKE '%".$request->get("byName")."%' OR g.name LIKE '%".$request->get('byName')."%'");
        }

        $divorces = $base_query->getQuery();

        $page = $this->getRequest()->query->get('page', 1);
        $paginator = $this->get('knp_paginator')->paginate($divorces, $page, 1);


        return $this->render(
            '@GdrGame/Anagrafe/divorces.html.twig',
            array(
                'paginator' => $paginator,
                'filter' => $filter,
                "typePage" => 3
            )
        );
    }

    public function weddingAction(){
        $base_query = $this->getDoctrine()->getRepository("GdrUserBundle:Wedding")->createQueryBuilder('w')
            ->innerJoin("w.bride", "b")
            ->innerJoin("w.groom", "g")
            ->andWhere("w.isDivorced = false")
            ->orderBy("w.endedAt", "DESC");

        $request = $this->getRequest();
        $filter = array();

        if($request->get("byLetter")){
            $filter = array(
                "byLetter" => $request->get("byLetter")
            );
            $base_query->andWhere("b.name LIKE '".$request->get("byLetter")."%' OR g.name LIKE '".$request->get('byLetter')."%'");
        }

        if($request->get("byName")){
            $filter = array(
                "byName" => $request->get("byName")
            );
            $base_query->andWhere("b.name LIKE '%".$request->get("byName")."%' OR g.name LIKE '%".$request->get('byName')."%'");
        }

        $divorces = $base_query->getQuery()->getResult();

        $page = $this->getRequest()->query->get('page', 1);
        $paginator = $this->get('knp_paginator')->paginate($divorces, $page, 1);


        return $this->render(
            '@GdrGame/Anagrafe/weddings.html.twig',
            array(
                'paginator' => $paginator,
                'filter' => $filter,
                "typePage" => 2
            )
        );
    }
}