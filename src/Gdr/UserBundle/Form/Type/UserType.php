<?php

namespace Gdr\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class UserType extends AbstractType
{

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'user';
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', 'email', array('label' => 'Inserisci un\'email valida e funzionante'))
            ->add('plainPassword', 'repeated', array(
                    'type' => 'password',
                    'invalid_message' => 'Le password devono combaciare.',
                    'required' => false,
                    'first_options'  => array('label' => 'Inserisci una password'),
                    'second_options' => array('label' => 'Ripeti la password'),
                    'constraints' => array(
                        new NotBlank(array("message" => "Devi inserire una password")),
                        new Length(array("min" => 6, "minMessage" => "La password deve essere lunga almeno 6 caratteri."))
                    ),
                ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
                'data_class' => 'Gdr\UserBundle\Entity\User',
            ));
    }
}