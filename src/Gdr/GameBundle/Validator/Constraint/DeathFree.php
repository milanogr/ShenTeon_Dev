<?php

namespace Gdr\GameBundle\Validator\Constraint;

use JMS\DiExtraBundle\Annotation\Validator;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Doctrine\ORM\EntityManager;
use JMS\DiExtraBundle\Annotation as DI;
use JMS\DiExtraBundle\Annotation\Inject;
use JMS\DiExtraBundle\Annotation\InjectParams;

/**
 * @Validator("DeathFree")
 */
class DeathFreeValidator extends ConstraintValidator
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
            $personage = $this->em->getRepository('GdrUserBundle:Personage')
                ->findOneBy(array(
                    'name' => $value,
                    'isDead' => false
                ));

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
}

/**
 * @Annotation
 */
class DeathFree extends Constraint
{
    public $message = 'Il Personaggio è già stato dichiarato morto';

    public function validatedBy()
    {
        return 'DeathFree';
    }
}