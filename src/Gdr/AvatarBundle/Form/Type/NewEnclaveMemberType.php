<?php
namespace Gdr\AvatarBundle\Form\Type;

use Gdr\GameBundle\Validator\Constraint\EnclaveFree;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class NewEnclaveMemberType extends AbstractType{

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
        $builder
            ->add("name", null, array(
                    'constraints' => array(
                        new EnclaveFree()
                    )
                ))
            ->add("rank", "entity", array(
            "class" => "GdrGameBundle:EnclaveRank",
            "query_builder" => function(EntityRepository $er) use ($builder){
                $id = $this->enclave->getId();
                return $er->createQueryBuilder("er")
                    ->innerJoin("er.enclave", "e")
                    ->andWhere("e.id = :clan")
                    ->andWhere("er.isMaster = false")
                    ->setParameter("clan", $id);
            }
        ));
    }

    /**
     * Mandatory in Symfony2
     * Gets the unique name of this form.
     * @return string
     */
    public function getName()
    {
        return 'add_member';
    }
}