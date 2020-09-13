<?php

namespace Gdr\UserBundle\Form\Type;

use Doctrine\ORM\EntityRepository;
use Gdr\UserBundle\Entity\Personage;
use Gdr\UserBundle\Validator\Constraint\CharsUsername;
use Gdr\UserBundle\Validator\Constraint\UsableUsername;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\Length;

class DeadPgNewRelativeType extends AbstractType
{
    protected $race;
    protected $canChangeSurname;

    public function __construct($race, $canChangeSurname = true)
    {
        $this->race = $race;
        $this->canChangeSurname = $canChangeSurname;
    }

    protected function _getRaceId()
    {
        return $this->race->getId();
    }

    protected function _getRace()
    {
        return $this->race;
    }

    protected function _getChoicesWeight()
    {
        $min = $this->_getRace()->getMinWeight();
        $max = $this->_getRace()->getMaxWeight();
        $array = array();
        for ($i = $min; $i <= $max; $i++) {
            $array[$i] = $i . " kg";
        }

        return $array;
    }

    protected function _getChoicesHeight()
    {
        $min = $this->_getRace()->getMinHeight();
        $max = $this->_getRace()->getMaxHeight();
        $array = array();
        for ($i = $min; $i <= $max; $i++) {
            $array[$i] = $i . " cm";
        }

        return $array;
    }

    protected function _getChoicesAge()
    {
        $min = $this->_getRace()->getAgeMin();
        $max = $this->_getRace()->getAgeMax();
        $array = array();
        for ($i = $min; $i <= $max; $i++) {
            $array[$i] = $i . " anni";
        }

        return $array;
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'step2';
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'epitaffio',
                null,
                array(
                    'mapped' => false,
                    'label' => "Breve epitaffio (200 lettere max) per il Pg morto",
                    'constraints' => array(
                        new Length(array('max' => 200))
                    )
                )
            )
            ->add(
                'name',
                null,
                array(
                    'label' => 'Nome del pg',
                    "constraints" => array(
                        new UsableUsername(),
                        new CharsUsername()
                    )
                )
            );

        if ($this->canChangeSurname) {
            $builder->add(
                "surname",
                "entity",
                array(
                    'label' => 'Cognome del pg',
                    "class" => "GdrUserBundle:Surname",
                    "query_builder" => function (EntityRepository $er) {
                        return $er->createQueryBuilder("s")
                            ->andWhere("s.race = " . $this->_getRaceId())
                            ->andWhere('s.isActive = true');
                    }
                )
            );
        }

        $builder->add(
            'gender',
            'choice',
            array(
                "choices" => Personage::getGenders(),
                "label" => "Sesso"
            )
        )
            ->add(
                "age",
                "choice",
                array(
                    "choices" => $this->_getChoicesAge(),
                    "label" => "Età (forza e saggezza cambiano in base all'età)",
                    'attr' => array('class' => 'age')
                )
            )
            ->add(
                "weight",
                "choice",
                array(
                    "choices" => $this->_getChoicesWeight(),
                    "label" => "Peso"
                )
            )
            ->add(
                "height",
                "choice",
                array(
                    "choices" => $this->_getChoicesHeight(),
                    "label" => "Altezza"
                )
            )
            ->add(
                "eyeColor",
                "entity",
                array(
                    "class" => "GdrRaceBundle:EyeColor",
                    "query_builder" => function (EntityRepository $er) {
                        return $er->createQueryBuilder("a")
                            ->innerJoin("a.races", "r")
                            ->andWhere("r.id = " . $this->_getRaceId());
                    },
                    "label" => "Colore degli occhi"
                )
            )
            ->add(
                "skinColor",
                "entity",
                array(
                    "class" => "GdrRaceBundle:SkinColor",
                    "query_builder" => function (EntityRepository $er) {
                        return $er->createQueryBuilder("a")
                            ->innerJoin("a.races", "r")
                            ->andWhere("r.id = " . $this->_getRaceId());
                    },
                    "label" => "Colore della pelle"
                )
            )
            ->add(
                "furColor",
                "entity",
                array(
                    "class" => "GdrRaceBundle:FurColor",
                    "query_builder" => function (EntityRepository $er) {
                        return $er->createQueryBuilder("a")
                            ->innerJoin("a.races", "r")
                            ->andWhere("r.id = " . $this->_getRaceId());
                    },
                    "label" => "Tipo di pelo"
                )
            )
            ->add(
                "hairColor",
                "entity",
                array(
                    "class" => "GdrRaceBundle:HairColor",
                    "query_builder" => function (EntityRepository $er) {
                        return $er->createQueryBuilder("a")
                            ->innerJoin("a.races", "r")
                            ->andWhere("r.id = " . $this->_getRaceId());
                    },
                    "label" => "Colore dei capelli"
                )
            );

        $builder->add(
            "squamaColor",
            null,
            array(
                "class" => "GdrRaceBundle:SquamaColor",
                "query_builder" => function (EntityRepository $er) {
                    return $er->createQueryBuilder("a")
                        ->innerJoin("a.races", "r")
                        ->andWhere("r.id = " . $this->_getRaceId());
                },
                "label" => "Tipo di squame"
            )
        );
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'Gdr\UserBundle\Entity\Personage',
            )
        );
    }
}