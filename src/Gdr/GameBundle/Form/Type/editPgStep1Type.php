<?php

namespace Gdr\GameBundle\Form\Type;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EditPgStep1Type extends AbstractType
{

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'edit_step1';
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("personage", "name_selector")
            ->add("race", "entity", array(
                    "label" => "Scegli la razza",
                    "class" => "GdrRaceBundle:Race"
                )
            );
    }
}