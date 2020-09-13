<?php

namespace Gdr\UserBundle\Form\Type;

use EWZ\Bundle\RecaptchaBundle\Validator\Constraints\IsTrue as RecaptchaTrue;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegisterType extends AbstractType
{

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'register';
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('user', new UserType(), array(
                    'error_bubbling' => true,
                ))
            ->add('referrer', 'name_selector', array(
                    'label' => 'Nome PG referrer',
                    'mapped' => false,
                    "required" => false
                ))
            ->add('terms', 'checkbox', array(
                    'label' => 'Accetto i termini di servizio',
                    'mapped' => false,
                    'constraints' => array(
                        new NotBlank(array("message" => "Devi accettare i termini del servizio")),
                    ),
                ))
            ->add('privacy', 'checkbox', array(
                    'label' => 'Consenso al trattamento dei dati personali ai sensi dell\'art. 23 D.Lgs 196/03',
                    'mapped' => false,
                    'constraints' => array(
                        new NotBlank(array("message" => "Devi consentire al trattamento dei dati personali.")),
                    ),
                ))
            ->add('ages', 'checkbox', array(
                    'label' => 'Dichiaro di avere 18 anni compiuti*',
                    'mapped' => false,
                    'constraints' => array(
                        new NotBlank(array("message" => 'Devi aver compiuto 18 anni.')),
                    ),
                ))
//            ->add('recaptcha', 'ewz_recaptcha', array(
//                    'label' => "Ricopia le parole",
//                    "mapped" => false,
//                    'constraints'   => array(
//                        new RecaptchaTrue(array("message" => "Le due parole non corrispondono."))
//                    )
//                ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
                'csrf_token' => true
            ));
    }
}