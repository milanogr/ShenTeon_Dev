<?php

namespace Gdr\UserBundle\Form\Type;

use Doctrine\ORM\EntityRepository;
use Gdr\RaceBundle\Entity\Race;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DeadPgNewType extends DeadPgNewRelativeType
{
    /**
     * @var \Gdr\RaceBundle\Entity\Race
     */
    protected $race;

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'nuovo_personaggio';
    }

    public function __construct(Race $race){
        $this->race = $race;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder
            ->add("surname", "entity", array(
                "class" => "GdrUserBundle:Surname",
                "query_builder" => function(EntityRepository $er){
                    return $er->createQueryBuilder("s")
                        ->andWhere("s.race = ".$this->_getRaceId());
                }
            ))
        ;
    }
}