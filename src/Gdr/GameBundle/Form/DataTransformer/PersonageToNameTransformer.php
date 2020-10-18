<?php

namespace Gdr\GameBundle\Form\DataTransformer;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

class PersonageToNameTransformer implements DataTransformerInterface
{
    private $em;

    public function __construct(EntityManager $em){
        $this->em = $em;
    }


    public function transform($personage)
    {
        if (null === $personage){
            return "";
        }

        return $personage->getName();
    }


    public function reverseTransform($name)
    {
        if (!$name){
            return null;
        }

        $personage = $this->em->getRepository('GdrUserBundle:Personage')
            ->findOneBy(array("name" => $name));

        if (null === $personage) {
            throw new TransformationFailedException(
                'Il personaggio scelto non esiste.'
            );
        }

        return $personage;
    }
}
