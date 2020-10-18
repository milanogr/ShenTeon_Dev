<?php

namespace Gdr\GameBundle\Form\Type;

use Gdr\GameBundle\Entity\Location;
use Gdr\UserBundle\Entity\Personage;
use Symfony\Component\Debug\Exception\FatalErrorException;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\Length;

class ChatType extends AbstractType
{
    protected $location;
    protected $personage;
    protected $choicesCombat;

    public function __construct(Location $location, Personage $personage, array $choicesCombat)
    {
        if (!$location || !$personage) {
            throw new \ErrorException();
        }

        $this->location = $location;
        $this->personage = $personage;
        $this->choicesCombat = $choicesCombat;
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'chat_form';
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $location = $this->location;
        $personage_id = $this->personage->getId();

        $builder
            ->add('freeTag', null, array(
                "constraints" => array(
                    new Length(array(
                        "max" => 10
                    ))
                ),
                "max_length" => 10
            ))
            ->add('body', 'text')
            ->add('special', 'hidden');

        if (false === $this->personage->getIsSoul()) {
            $builder->add('skill', 'hidden', array('attr' => array('class' => 'input-skill')))
                ->add(
                    'spell',
                    'entity',
                    array(
                        'required' => false,
                        'empty_value' => '',
                        'class' => 'GdrUserBundle:Spell',
                        'query_builder' => function (EntityRepository $er) use ($personage_id) {

                                return $er->createQueryBuilder('s')
                                    ->innerJoin('GdrUserBundle:Grimory', 'g', 'WITH', 'g.spell = s.id')
                                    ->innerJoin('GdrUserBundle:SpellCategory', 'sc', 'WITH', 's.category = sc.id')
                                    ->andWhere('g.personage = :personage')
                                    ->setParameter('personage', $personage_id)
                                    ->andWhere('g.isLearned = :true')
                                    ->setParameter('true', true)
                                    ->andWhere('s.isActive = :true')
                                    ->setParameter('true', true)
                                    ->andWhere('g.isUsed = :false')
                                    ->setParameter('false', false)
                                    ->orderBy('s.name');
                            },
                        'group_by' => 'categoryName',
                        'error_bubbling' => true
                    )
                );
        }

        $builder->add(
            'tag',
            'entity',
            array(
                'class' => 'GdrGameBundle:TagChat',
                'query_builder' => function (EntityRepository $er) use ($location) {

                        return $er->createQueryBuilder('t')
                            ->andWhere('t.location = :id')
                            ->setParameter('id', $location)
                            ->orderBy('t.name', 'ASC');
                    },
                'error_bubbling' => true,
                'required' => false,
                'empty_value' => 'Scegli tag:',
            )
        );

        $builder->add(
            'language',
            'entity',
            array(
                'class' => "GdrUserBundle:Language",
                'query_builder' => function (EntityRepository $er) {

                        return $er->createQueryBuilder('l')
                            ->innerJoin('l.race', 'r')
                            ->andWhere('l.personage = :pg')
                            ->setParameter('pg', $this->personage->getId())
                            ->groupBy('l.race');
                    },
                'error_bubbling' => true,
                'required' => false,
                'empty_value' => 'Lingua comune',
                "property" => "race.publicName"
            )
        );

        $builder->add(
            'combat',
            'choice',
            array(
                'choices' => $this->choicesCombat
            )
        );
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'Gdr\GameBundle\Entity\Chat',
                'csrf_protection' => false
            )
        );
    }

}