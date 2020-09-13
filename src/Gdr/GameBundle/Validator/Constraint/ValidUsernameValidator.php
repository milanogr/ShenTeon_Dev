<?php

namespace Gdr\GameBundle\Validator\Constraint;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use JMS\DiExtraBundle\Annotation\Validator;
use JMS\DiExtraBundle\Annotation as DI;

/**
 * @Validator("UsernameExist")
 */
class ValidUsernameValidator extends ConstraintValidator
{
    /** @DI\Inject("doctrine.orm.entity_manager") */
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
        $personage = $this->em
            ->getRepository('GdrUserBundle:Personage')
            ->findOneBy(array('name' => $value))
            ;

        if (null === $personage) {
            $this->context->addViolation(
                $constraint->message,
                array(
                    '%string' => $value
                )
            );
        }
    }
}