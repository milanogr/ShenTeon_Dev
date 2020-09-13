<?php

namespace Gdr\GameBundle\Listener\Killer;

use Gdr\GameBundle\Event\Killer\PlayerKilledEvent;
use Gdr\GameBundle\Service\Notificator\NotifierInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Templating\EngineInterface;

class NotifyKilledRandomly implements EventSubscriberInterface
{
    /**
     * @var NotifierInterface
     */
    private $notifier;
    /**
     * @var EngineInterface
     */
    private $templating;

    public function __construct(NotifierInterface $notifier, EngineInterface $templating)
    {
        $this->notifier = $notifier;
        $this->templating = $templating;
    }

    public static function getSubscribedEvents()
    {
        return [
            'player.killed.randomly' => [
                ['sendNotificationToPlayer'],
                ['sendNotificationToAdmin'],
            ]
        ];
    }

    public function sendNotificationToPlayer(PlayerKilledEvent $event)
    {
        $body = $this->templating->render('@GdrGame/Killer/notifyPlayerForRandomlyKill.html.twig');

        $this->notifier->send($body, $event->getPlayer()->getId());
    }

    public function sendNotificationToAdmin(PlayerKilledEvent $event)
    {
        $body = $this->templating->render('@GdrGame/Killer/notifyAdminForPlayerRandomlyKilled.html.twig', [
            'player' => $event->getPlayer()
        ]);

        $this->notifier->multipleSend($body, [1, 22, 27]);
    }
}