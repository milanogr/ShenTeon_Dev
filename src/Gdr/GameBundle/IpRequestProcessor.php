<?php

namespace Gdr\GameBundle;

use JMS\DiExtraBundle\Annotation\Inject;
use JMS\DiExtraBundle\Annotation\InjectParams;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\Request;

class IpRequestProcessor
{
    private $container;
    private $ip;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function processRecord(array $record)
    {
        if (null === $this->ip) {
            try {
                $this->ip = $this->container->get('request')->getClientIp();
            } catch (\RuntimeException $e) {
                $this->ip = '????????';
            }
        }
        $record['extra']['ip'] = $this->ip;

        return $record;
    }
} 