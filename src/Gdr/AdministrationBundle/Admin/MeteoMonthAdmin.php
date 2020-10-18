<?php

namespace Gdr\AdministrationBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class MeteoMonthAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add("name")
            ->add("monthIndex")
            ->add("season")
            ->add("tempMin")
            ->add("tempMax");
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper;

    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier("name")
            ->add("monthIndex")
            ->add("season")
            ->add("tempMin")
            ->add("tempMax");
    }

    public function getFormTheme()
    {
        return array_merge(
            parent::getFormTheme(),
            array('GdrAdministrationBundle:Form:admin_file_type.html.twig')
        );
    }
}