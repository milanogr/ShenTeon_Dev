<?php

namespace Gdr\GameBundle\Service\Logger;

use Monolog\Logger;

/**
 * Class CronLogger
 * @package Gdr\GameBundle\Service\Logger
 */
class CronLogger
{

    /**
     * @var Logger
     */
    private $logger;

    /**
     * @param Logger $logger
     */
    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @param $message
     * @param null|string $namespace
     */
    public function log($message, $namespace = "Cron"){
        $this->logger->info($namespace . " - " . $message);
    }
}