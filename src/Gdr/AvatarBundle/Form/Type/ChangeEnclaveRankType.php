<?php
namespace Gdr\AvatarBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class ChangeEnclaveRankType extends AbstractType{

    /*
    *
    * Builds the AddUser form
    * @param  \Symfony\Component\Form\FormBuilder $builder
    * @param  array $options
    * @return void
    */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $id = $builder->getData()->getEnclaveRank()->getEnclave()->getId();

        $builder->add("enclaveRank", "entity", array(
            "class" => "GdrGameBundle:EnclaveRank",
            "query_builder" => function(EntityRepository $er) use ($id){

                return $er->createQueryBuilder("er")
                    ->innerJoin("er.enclave", "e")
                    ->andWhere("e.id = :enclave")
                    ->andWhere("er.isMaster = 0")
                    ->setParameter("enclave", $id);
            }
        ));
    }

    /**
     * Returns the default options/class for this form.
     * @param array $options
     * @return array The default options
     */
    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Gdr\UserBundle\Entity\Personage'
        );
    }

    /**
     * Mandatory in Symfony2
     * Gets the unique name of this form.
     * @return string
     */
    public function getName()
    {
        return 'edit_member';
    }
}