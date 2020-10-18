<?php

namespace Gdr\AdministrationBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class MeteoMessageAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add("message")
            ->add("start")
            ->add("end");
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add("start")
            ->add("end");

    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier("message")
            ->add("start")
            ->add("end");
    }

    public function getFormTheme()
    {
        return array_merge(
            parent::getFormTheme(),
            array('GdrAdministrationBundle:Form:admin_file_type.html.twig')
        );
    }
}