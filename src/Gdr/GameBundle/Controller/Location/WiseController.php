<?php

namespace Gdr\GameBundle\Controller\Location;

use Doctrine\ORM\EntityNotFoundException;
use Gdr\UserBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class WiseController extends Controller
{
    public function indexAction(Request $request)
    {
        $tags = $this
            ->getDoctrine()
            ->getRepository('GdrGameBundle:Wise\WiseTag')
            ->getAll();

        return $this->render('GdrGameBundle:Locations/Wise:index.html.twig', compact('tags'));
    }

    public function askAction(Request $request)
    {
        $tag = $this
            ->getDoctrine()
            ->getRepository('GdrGameBundle:Wise\WiseTag')
            ->getByName($request->get('tag'));

        if (!$tag){
            return new JsonResponse([
                'response' => false
            ]);
        }

        $sentences = $this
            ->getDoctrine()
            ->getRepository('GdrGameBundle:Wise\WiseSentence')
            ->getAllByTag($tag);

        return new JsonResponse([
            'response' => true,
            'sentences' => $sentences
        ]);
    }
}