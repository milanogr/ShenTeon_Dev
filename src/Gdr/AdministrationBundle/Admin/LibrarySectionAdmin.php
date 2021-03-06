<?php

namespace Gdr\AdministrationBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class LibrarySectionAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add("name")
            ->add(
                'image',
                'admin_file',
                array('data_class' => 'Symfony\Component\HttpFoundation\File\File', 'required' => false)
            )
            ->add("sort")
            ->add("isMuseo", null, array("required" => false))
            ->add("isArchivio", null, array("required" => false))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add("name")
            ->add("sort")
            ->add("isMuseo")
            ->add("isArchivio")
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier("name")
            ->add("sort")
            ->add("isMuseo")
            ->add("isArchivio")
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