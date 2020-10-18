<?php
namespace Gdr\AdministrationBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class ManualeAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add("title")
            ->add("slug", null, array("help" => "Il titolo dell'URL del sito per raggiungere il documento."))
            ->add("sort")
            ->add("active", null, array("required" => false))
            ->add("isForSite", null, array("required" => false))
            ->add("body", "ckeditor");
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add("title")
            ->add("sort")
            ->add("active")
            ->add("isForSite");
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier("title")
            ->add("sort")
            ->add("active")
            ->add("isForSite");
    }

    public function getFormTheme()
    {
        return array_merge(
            parent::getFormTheme(),
            array('GdrAdministrationBundle:Form:admin_file_type.html.twig')
        );
    }
}