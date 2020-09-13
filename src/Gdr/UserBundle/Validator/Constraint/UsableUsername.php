<?php

namespace Gdr\UserBundle\Validator\Constraint;

use JMS\DiExtraBundle\Annotation\Validator;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Doctrine\ORM\EntityManager;
use JMS\DiExtraBundle\Annotation as DI;
use JMS\DiExtraBundle\Annotation\Inject;
use JMS\DiExtraBundle\Annotation\InjectParams;

/**
 * @Validator("UsableUsername")
 */
class UsableUsernameValidator extends ConstraintValidator
{
    /**
     * @DI\Inject("doctrine.orm.entity_manager")
     * @var \Doctrine\ORM\EntityManager
     */
    public $em;

    /**
     * Checks if the passed value is valid.
     *
     * @param mixed      $value      The value that should be validated
     * @param Constraint $constraint The constraint for the validation
     *
     * @api
     */
    public function validate($value, Constraint $constraint)
    {
        if (null !== $value){
            $existInPersonage = $this->em->getRepository('GdrUserBundle:Personage')
                ->findOneBy(array('name' => $value));

            $existInGrave = $this->em->getRepository('GdrUserBundle:Gravestone')
                ->findOneBy(array('nickname' => $value));

            $existInForbidden = $this->em->getRepository('GdrUserBundle:ForbiddenName')
                ->findOneBy(array('name' => $value));

            if ($existInPersonage || $existInGrave || $existInForbidden) {
                $this->context->addViolation(
                    $constraint->message,
                    array(
                        '%string' => $value
                    )
                );
            }
        }
    }
}

/**
 * @Annotation
 */
class UsableUsername extends Constraint
{
    public $message = 'Questo nome non è disponibile, devi sceglierne un altro.';

    public function validatedBy()
    {
        return 'UsableUsername';
    }
}