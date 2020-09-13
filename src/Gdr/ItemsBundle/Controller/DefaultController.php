<?php

namespace Gdr\ItemsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('GdrItemsBundle:Default:index.html.twig', array('name' => $name));
    }
}
