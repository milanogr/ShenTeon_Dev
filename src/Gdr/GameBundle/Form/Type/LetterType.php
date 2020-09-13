<?php

namespace Gdr\GameBundle\Form\Type;

use Doctrine\ORM\EntityRepository;
use Gdr\GameBundle\Entity\Letter;
use Gdr\GameBundle\Validator\Constraint\EnoughMoney;
use Gdr\GameBundle\Validator\Constraint\EnoughMoneyValidator;
use Gdr\GameBundle\Validator\Constraint\ValidUsername;
use Gdr\UserBundle\Entity\Personage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

class LetterType extends AbstractType
{
    protected $type;
    /**
     * @var \Gdr\GameBundle\Permission
     */
    protected $permission;
    protected $isForGroup;
    /**
     * @var \Gdr\UserBundle\Entity\Personage
     */
    protected $personage;

    public function __construct(
        $permission,
        $type = Letter::ACTION_NEW,
        $isForGroup = false,
        Personage $personage = null
    ) {
        $this->type = $type;
        $this->permission = $permission;
        $this->isForGroup = $isForGroup ? true : false;
        $this->personage = $personage;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        if (Letter::ACTION_NEW === $this->type || Letter::ACTION_INOLTRA === $this->type) {

            if ($this->isForGroup === false) {
                $builder->add(
                    'receiverName',
                    'text',
                    array(
                        'label' => 'Destinatario',
                        'constraints' => array(
                            new NotBlank(),
                            new ValidUsername()
                        )
                    )
                );
            } else {
                $choices = array();

                // Faccio parte di Enclave?
                if (false !== $this->personage->hasEnclave()) {
                    $enclave = $this->personage->hasEnclave();
                    $choices[Letter::GROUP_ENCLAVE] = 'Enclave: ' . $enclave->getName();
                }
                if (false !== $this->personage->hasClan()) {
                    $clan = $this->personage->hasClan();
                    $choices[Letter::GROUP_CLAN] = 'Enclave Razziale: ' . $clan->getName();
                }
                if ($this->permission->isMod()) {
                    $choices[Letter::GROUP_MOD] = 'Tutti i Moderatori';
                }
                if ($this->permission->isFate()) {
                    $choices[Letter::GROUP_FATE] = 'Tutto il Fato';
                }
                if ($this->permission->isAdmin()) {
                    $choices[Letter::GROUP_ALL] = "Tutti i Personaggi registrati";
                    $choices[Letter::GROUP_ONLINE] = "Tutti i Personaggi ONLINE";
                }

                $builder->add(
                    'receiverGroup',
                    'choice',
                    array('choices' => $choices, 'required' => true, 'label' => 'Destinatario', 'mapped' => false)
                );
            }

            $builder->add('category', 'choice', array('choices' => Letter::getCategories(), 'label' => 'Ambito'));

            if (Letter::ACTION_INOLTRA !== $this->type) {
                $builder->add(
                    'background',
                    'entity',
                    array(
                        'label' => 'Acquista Pergamena',
                        'required' => false,
                        'empty_value' => 'Standard - Prezzo: 0 Mori',
                        'class' => 'Gdr\GameBundle\Entity\LetterBackground',
                        'query_builder' => function (EntityRepository $er) {
                            return $er->createQueryBuilder('lb')
                                ->orderBy('lb.price', 'ASC');
                        },
                    )
                );
            }
        }

        if ($this->permission->isAdmin()){
            $builder
                ->add('body','ckeditor');
        }else{
            $builder
                ->add('body','ckeditor',array( 'config_name' => 'base'));
        }

        if (Letter::ACTION_REPLY === $this->type) {
            $builder->add(
                'deleteOnReply',
                'checkbox',
                array('required' => false, 'label' => 'Cancella rispondendo', 'mapped' => false)
            );
        }

        if ($this->permission->isAdmin()) {
            $builder->add(
                'nameAsAdmin',
                'checkbox',
                array('required' => false, 'label' => 'Scrivi come Gestore')
            );
        }
        if ($this->permission->isMod()) {
            $builder->add(
                'nameAsMod',
                'checkbox',
                array('required' => false, 'label' => 'Scrivi come Moderatore')
            );
        }
        if ($this->permission->isFate()) {
            $builder->add(
                'nameAsFate',
                'checkbox',
                array('required' => false, 'label' => 'Scrivi come Fato')
            );
        }
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'Gdr\GameBundle\Entity\Letter',
            )
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'letter_form';
    }
}
