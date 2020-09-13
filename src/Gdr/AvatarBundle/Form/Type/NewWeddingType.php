<?php
namespace Gdr\AvatarBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class NewWeddingType extends AbstractType
{
    /*
    *
    * Builds the AddUser form
    * @param  \Symfony\Component\Form\FormBuilder $builder
    * @param  array $options
    * @return void
    */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add("groom", "name_selector", array("label" => "Sposo n°1"))
            ->add("bride", "name_selector", array("label" => "Sposo n°2"))
            ->add("type", null, array("label" => "Testo cerimonia"));
    }

    /**
     * Returns the default options/class for this form.
     *
     * @param array $options
     *
     * @return array The default options
     */
    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Gdr\UserBundle\Entity\Wedding'
        );
    }

    /**
     * Mandatory in Symfony2
     * Gets the unique name of this form.
     *
     * @return string
     */
    public function getName()
    {
        return 'add_wedding';
    }
}