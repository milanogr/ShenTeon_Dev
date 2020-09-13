<?php

namespace Gdr\GameBundle\Service\Money;


use Doctrine\ORM\EntityManager;
use Gdr\GameBundle\Entity\TransactionType;
use Gdr\GameBundle\Service\BankLogger;
use Gdr\UserBundle\Entity\Personage;

class Trading
{
    /**
     * @var EntityManager
     */
    private $manager;
    /**
     * @var BankLogger
     */
    private $bankLogger;

    public function __construct(EntityManager $manager, BankLogger $bankLogger)
    {
        $this->manager = $manager;
        $this->bankLogger = $bankLogger;
    }

    public function buy(Personage $player, $price, $notify = true, $notificationDescription = null, $transactionType = TransactionType::MARKET)
    {
        if (false == $this->canBuy($player, $price)){
            return false;
        }

        $newCountValue = $player->getBankAmount() - $price;
        $player->setBankAmount($newCountValue);

        $this->manager->flush($player);

        if ($notify){
            $this->bankLogger->log($price, null, $player, $notificationDescription, $transactionType, false);
        }

        return true;
    }

    public function canBuy(Personage $player, $price)
    {
        if ($player->getBankAmount() < $price) {
            return false;
        }

        return true;
    }
}