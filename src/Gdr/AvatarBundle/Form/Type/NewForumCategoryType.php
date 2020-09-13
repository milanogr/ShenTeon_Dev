<?php
namespace Gdr\AvatarBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class NewForumCategoryType extends AbstractType{

    /**
     * @var \Gdr\GameBundle\Entity\Enclave
     */
    var $enclave;

    public function __construct($enclave){
        $this->enclave = $enclave;
    }

    /*
    *
    * Builds the AddUser form
    * @param  \Symfony\Component\Form\FormBuilder $builder
    * @param  array $options
    * @return void
    */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add("name")
            ->add("description")
            ->add("forum", "entity", array(
                "class" => "GdrGameBundle:Forum",
                "query_builder" => function(EntityRepository $er){
                    return $er->createQueryBuilder("f")
                        ->andWhere("f.enclave = :enclave")
                        ->setParameter("enclave", $this->enclave);
                }
            ))
            ->add("levelMin")
            ->add("sort");
    }

    /**
     * Returns the default options/class for this form.
     * @param array $options
     * @return array The default options
     */
    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Gdr\GameBundle\Entity\ForumCategory'
        );
    }

    /**
     * Mandatory in Symfony2
     * Gets the unique name of this form.
     * @return string
     */
    public function getName()
    {
        return 'forum_category';
    }
}