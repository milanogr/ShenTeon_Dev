<?php

namespace Gdr\UserBundle\Listener;

use Symfony\Component\DependencyInjection\Container;

class RequestInjector
{

    protected $container;

    public function __construct(Container $container){

        $this->container = $container;
    }

    public function getRequest(){

        return $this->container->get('request');
    }

    public function getParameter($parameter){
        return $this->container->getParameter($parameter);
    }

    public function getSession(){
        return $this->container->get('session');
    }
}