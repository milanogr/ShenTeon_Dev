<?php
namespace Gdr\AvatarBundle\Form\Type;

use Gdr\GameBundle\Validator\Constraint\LifeFree;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class NewRebornType extends AbstractType{

    /*
    *
    * Builds the AddUser form
    * @param  \Symfony\Component\Form\FormBuilder $builder
    * @param  array $options
    * @return void
    */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add("name", null, array(
                'constraints' => array(
                    new LifeFree()
                )
            ));
    }

    /**
     * Mandatory in Symfony2
     * Gets the unique name of this form.
     * @return string
     */
    public function getName()
    {
        return 'add_reborn';
    }
}