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
 * @Validator("CharsUsername")
 */
class CharsUsernameValidator extends ConstraintValidator
{
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
            if (!preg_match('/^[a-zA-Z]+$/', $value, $matches)) {
                $this->context->addViolation($constraint->message, array('%string%' => $value));
            }
        }
    }
}

/**
 * @Annotation
 */
class CharsUsername extends Constraint
{
    public $message = 'Puoi usare soltanto i caratteri dell\'alfabeto, numeri esclusi.';

    public function validatedBy()
    {
        return 'CharsUsername';
    }
}