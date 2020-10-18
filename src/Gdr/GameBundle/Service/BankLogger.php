<?php
namespace Gdr\GameBundle\Service;

use Gdr\GameBundle\Entity\Transaction;
use Gdr\GameBundle\Entity\TransactionType;
use Gdr\UserBundle\Entity\Personage;
use JMS\DiExtraBundle\Annotation\Inject;
use JMS\DiExtraBundle\Annotation\InjectParams;
use JMS\DiExtraBundle\Annotation\Service;
use JMS\DiExtraBundle\Annotation as DI;

/**
 * Class Erario
 *
 * Contiene metodi condivisi per l'erario e la proprietà.
 *
 * @DI\Service("gdr.banklogger", public=true)
 */
class BankLogger
{
    /**
     * @Inject("doctrine.orm.entity_manager")
     * @var \Doctrine\ORM\EntityManager
     */
    public $em;

    /**
     * @param int  $amount
     * @param      $sender
     * @param      $subject // Sempre presente
     * @param null $note
     * @param int  $type
     * @param bool $isPlus
     * @param bool $hidden
     */
    public function log($amount = 0, $sender = null, Personage $subject, $note = null, $type = TransactionType::MARKET, $isPlus = true, $hidden = false)
    {
        $log = new Transaction();
        $log->setAmount($amount);
        $log->setSender($sender);
        $log->setSubject($subject);
        $log->setNote($note);
        $log->setType($this->getType($type));
        $log->setIsHidden($hidden);
        $log->setIsPlus($isPlus);

        $this->em->persist($log);
        $this->em->flush();
    }

    /**
     * @param $type_id
     *
     * @return TransactionType
     */
    public function getType($type_id)
    {
        return $this->em->getRepository('GdrGameBundle:TransactionType')
            ->find($type_id);
    }
}