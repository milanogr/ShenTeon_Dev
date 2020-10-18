<?php

namespace Gdr\AdministrationBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class MeteoConditionAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add("name")
            ->add(
                'image',
                'admin_file',
                array('data_class' => 'Symfony\Component\HttpFoundation\File\File', 'required' => false)
            )
            ->add(
                'imageNight',
                'admin_file',
                array('data_class' => 'Symfony\Component\HttpFoundation\File\File', 'required' => false)
            )
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper;

    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier("name");
    }

    public function getFormTheme()
    {
        return array_merge(
            parent::getFormTheme(),
            array('GdrAdministrationBundle:Form:admin_file_type.html.twig')
        );
    }
}