<?php

namespace Gdr\GameBundle\Service\Notificator;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityNotFoundException;
use Gdr\GameBundle\Entity\Letter;
use Gdr\GameBundle\Service\TextPurifier;

class LetterNotifier implements NotifierInterface
{

    /**
     * @var EntityManager
     */
    protected $entityManager;

    /**
     * @var TextPurifier
     */
    protected $purifier;

    public function __construct(EntityManager $entityManager, TextPurifier $purifier)
    {
        $this->entityManager = $entityManager;
        $this->purifier = $purifier;
    }

    public function send($body, $destinatario_id, $mittenteName = "Gestione")
    {
        $destinatario = $this->entityManager->getRepository('GdrUserBundle:Personage')
            ->find($destinatario_id);

        if (null === $destinatario) {
            throw new EntityNotFoundException();
        }

        $letter = new Letter();
        $letter->setReceiver($destinatario);
        $letter->setBody($this->purifier->purify($body));
        $letter->setSenderName($mittenteName);
        $letter->setCategory(Letter::CATEGORY_ORG);

        $this->entityManager->persist($letter);
        $this->entityManager->flush();
    }

    public function multipleSend($body, array $to, $fromName = "Gestione")
    {
        foreach ($to as $id) {

            $destinatario = $this->entityManager->getRepository('GdrUserBundle:Personage')
                ->find($id);

            if (null === $destinatario) {
                return;
            }


            $letter = new Letter();
            $letter->setReceiver($destinatario);
            $letter->setBody($body);
            $letter->setSenderName($fromName);
            $letter->setCategory(Letter::CATEGORY_ORG);

            $this->entityManager->persist($letter);

        }

        $this->entityManager->flush();
    }

}