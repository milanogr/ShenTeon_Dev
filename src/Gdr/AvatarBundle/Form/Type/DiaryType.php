<?php

namespace Gdr\AvatarBundle\Form\Type;

use Gdr\GameBundle\Entity\Location;
use Gdr\GameBundle\Permission;
use Symfony\Component\Debug\Exception\FatalErrorException;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DiaryType extends AbstractType
{
    public $permission;

    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'diary_form';
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, array('label' => 'Titolo della pagina'));


        if ($this->permission->isAdmin()) {
            $builder
                ->add('body', 'ckeditor', array('label' => ' '));
        } else {
            $builder
                ->add('body', 'ckeditor', array('config_name' => 'base', 'label' => ' '));
        }

        $builder->add("isHidden", null, array("label" => "Rendi visibile solo a te", "required" => false));
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'Gdr\AvatarBundle\Entity\Diary'
            )
        );
    }
}