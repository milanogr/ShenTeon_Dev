<?php
namespace Gdr\AvatarBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class ChangeClanRankType extends AbstractType{

    /*
    *
    * Builds the AddUser form
    * @param  \Symfony\Component\Form\FormBuilder $builder
    * @param  array $options
    * @return void
    */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add("clanRank", "entity", array(
            "class" => "GdrGameBundle:EnclaveRank",
            "query_builder" => function(EntityRepository $er) use ($builder){
                $id = $builder->getData()->getClanRank()->getEnclave()->getId();
                return $er->createQueryBuilder("er")
                    ->innerJoin("er.enclave", "e")
                    ->andWhere("e.id = :clan")
                    ->andWhere("er.isMaster = 0")
                    ->setParameter("clan", $id);
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