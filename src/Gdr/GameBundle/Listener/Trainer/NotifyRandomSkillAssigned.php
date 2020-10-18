<?php
/**
 * Created by PhpStorm.
 * User: diego
 * Date: 08/01/15
 * Time: 14:41
 */

namespace Gdr\GameBundle\Listener\Trainer;

use Gdr\GameBundle\Event\Trainer\SkillRandomlyAssignedEvent;
use Gdr\GameBundle\Service\Notificator\NotifierInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Templating\EngineInterface;

class NotifyRandomSkillAssigned implements EventSubscriberInterface
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
            'player.skill.randomly.assigned' => 'sendNotificationToPlayer'
        ];
    }

    public function sendNotificationToPlayer(SkillRandomlyAssignedEvent $event)
    {
        $body = $this->templating->render('@GdrGame/Notification/Trainer/notifyPlayerRandomlySkillAssigned.html.twig', [
            'player' => $event->getPlayer(),
            'skill' => $event->getSkill()
        ]);

        $this->notifier->send($body, $event->getPlayer()->getId());
    }
}