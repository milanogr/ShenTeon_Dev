<?php

namespace Gdr\AdministrationBundle\Admin;

use Gdr\GameBundle\Entity\Forum;
use Gdr\UserBundle\Entity\Gravestone;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class GravestoneAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add("nickname")
            ->add("surname")
            ->add("deathAt", null, array('widget' => 'text'))
            ->add("typeYear", "choice", array("choices"=>Gravestone::getTypeYears()))
            ->add("deathAge")
            ->add("inFamilyGrave")
            ->add("message")
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper

        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier("nickname")
            ->add("surname")
            ->add("deathAt")
            ->add("inFamilyGrave")
        ;
    }

    public function getFormTheme()
    {
        return array_merge(
            parent::getFormTheme(),
            array('GdrAdministrationBundle:Form:admin_file_type.html.twig')
        );
    }
}