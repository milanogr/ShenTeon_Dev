<?php

namespace Gdr\UserBundle\Form\Type;

use Gdr\UserBundle\Entity\PersonageRepository;
use Gdr\UserBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ChoosePgType extends AbstractType
{
    /**
     * @var array I personaggi dell'utente loggato
     */
    private $personages = array();

    public function __construct(array $personages)
    {
        $this->personages = $personages;
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'user_choose_pg';
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', 'choice', array(
                'choices' => $this->personages,
                'label' => 'Scegli il tuo personaggio'
            ));
    }
}