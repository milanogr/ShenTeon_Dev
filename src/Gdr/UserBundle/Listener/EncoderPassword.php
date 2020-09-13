<?php

namespace Gdr\UserBundle\Listener;

use Gdr\UserBundle\Entity\User;
use Symfony\Component\Security\Core\Encoder\EncoderFactory;

class EncoderPassword
{
    public $encoder;

    public function __construct(EncoderFactory $encoder)
    {
        $this->encoder = $encoder;
    }

    public function encodePassword(User $user, $plainPassword)
    {
        $encoder = $this->encoder->getEncoder($user)
        ;

        return $encoder->encodePassword($plainPassword, $user->getSalt());
    }
}