<?php

namespace Gdr\GameBundle\Validator\Constraint;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class ValidUsername extends Constraint
{
    public $message = 'Il nome del personaggio non risulta negli archivi.';

    public function validatedBy(){
        return 'UsernameExist';
    }
}