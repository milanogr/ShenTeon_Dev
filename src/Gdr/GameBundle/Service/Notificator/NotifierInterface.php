<?php

namespace Gdr\GameBundle\Service\Notificator;


use Doctrine\ORM\EntityManager;
use Gdr\GameBundle\Service\TextPurifier;

interface NotifierInterface
{

    public function __construct(EntityManager $entityManager, TextPurifier $purifier);

    public function send($body, $receiver, $senderName = null);

    public function multipleSend($body, array $receivers, $senderName = null);

}