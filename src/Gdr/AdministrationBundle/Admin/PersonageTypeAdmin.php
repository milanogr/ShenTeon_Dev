<?php

namespace Gdr\AdministrationBundle\Admin;

use Gdr\UserBundle\Entity\PersonageType;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class PersonageTypeAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add("personage", "name_selector", array("required" => true))
            ->add("isGestore", null, array("required" => false))
            ->add("isModeratore", null, array("required" => false))
            ->add("isGuida", null, array("required" => false))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add("personage")
            ->add("isGestore")
            ->add("isModeratore")
            ->add("isGuida")
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier("id")
            ->add("personage")
            ->add("isGestore")
            ->add("isModeratore")
            ->add("isGuida")
        ;
    }

}