<?php

namespace Gdr\AvatarBundle\Form\Type;

use Gdr\GameBundle\Entity\Location;
use Gdr\GameBundle\Validator\Constraint\NotBanned;
use Gdr\UserBundle\Entity\Esilio;
use Symfony\Component\Debug\Exception\FatalErrorException;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EsilioType extends AbstractType
{

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'esilio_form';
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('reason', null, array('label' => 'Motivo'))
            ->add('days', 'choice', array('label' => 'Giorni di esilio', 'choices' => Esilio::getDaysChoice()))
            ->add('personage', 'name_selector', array('label' => 'Nome del PG da Esiliare'));
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'Gdr\UserBundle\Entity\Esilio'
            )
        );
    }
}