<?php

namespace Gdr\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

class ResetType extends AbstractType
{

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'user_reset';
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'plainPassword',
                'repeated',
                array(
                    'type' => 'password',
                    "constraints" => array(
                        new NotBlank()
                    ),
                    'first_options'  => array('label' => 'Nuova Password'),
                    'second_options' => array('label' => 'Ripeti la Password'),
                )
            )
            ->add('token_reset', 'hidden')
            ->add('email_reset', 'hidden');
    }
}