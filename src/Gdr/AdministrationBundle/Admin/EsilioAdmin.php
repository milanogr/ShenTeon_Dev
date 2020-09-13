<?php

namespace Gdr\AdministrationBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class EsilioAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add("reason")
            ->add("days", null, array('required' => false))
            ->add("until")
            ->add("moderator")
            ->add("banned")
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add("reason")
            ->add("days")
            ->add("until")
            ->add("moderator")
            ->add("banned");
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier("id")
            ->add("reason")
            ->add("days")
            ->add("until")
            ->add("moderator")
            ->add("banned");
    }
}