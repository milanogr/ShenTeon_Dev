<?php

namespace Gdr\AdministrationBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class MeteoStatusAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add("condition")
            ->add("wind")
            ->add("temp")
            ->add("isFixed")
            ->add("expiresAt")
            ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper;

    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier("id")
            ->add("condition")
            ->add("wind")
            ->add("temp")
            ->add("isFixed")
            ->add("expiresAt");
    }

    public function getFormTheme()
    {
        return array_merge(
            parent::getFormTheme(),
            array('GdrAdministrationBundle:Form:admin_file_type.html.twig')
        );
    }
}