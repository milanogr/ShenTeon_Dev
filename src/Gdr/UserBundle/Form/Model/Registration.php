<?php
/**
 * Created by JetBrains PhpStorm.
 * User: diego
 * Date: 16/06/13
 * Time: 23:55
 * To change this template use File | Settings | File Templates.
 */

namespace Gdr\UserBundle\Form\Model;

use Symfony\Component\Validator\Constraints as Assert;

class Registration
{
    /**
     * @Assert\Type(type="Gdr/UserBundle/Entity/User")
     * @Assert\Valid()
     */
    protected $user;


    /**
     * @Assert\NotBlank()
     * @Assert\True()
     */
    protected $termsAccepted;

    public function setUser(User $user)
    {
        $this->user = $user;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function getTermsAccepted()
    {
        return $this->termsAccepted;
    }

    public function setTermsAccepted($termsAccepted)
    {
        $this->termsAccepted = (Boolean) $termsAccepted;
    }
}