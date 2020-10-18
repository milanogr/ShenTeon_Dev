<?php

namespace Gdr\GameBundle\Form\Type;

use Gdr\UserBundle\Entity\Online;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class OnlineStatusType extends AbstractType
{
    protected $canInvisibile;

    public function __construct($canInvisibile = false){
        $this->canInvisibile = $canInvisibile;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('status', 'choice', array("choices" => Online::getAllStatus()));

        if ($this->canInvisibile){
            $builder->add('isInvisible', null, array('required' => false));
        }
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'Gdr\UserBundle\Entity\Online',
            )
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'online_status_form';
    }
}
