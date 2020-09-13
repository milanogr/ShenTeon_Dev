<?php

namespace Gdr\AdministrationBundle\Admin;

use Gdr\GameBundle\Entity\Location;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class LocationImageAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add("location")
            ->add("condition")
            ->add(
                'image',
                'admin_file',
                array('required' => false)
            )
            ->add("forNight", null, array("required" => false, "help" => "Se non selezionato, sarà per il giorno."));
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add("id")
            ->add("location")
            ->add("condition")
            ->add("forNight");
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier("id")
            ->add("location")
            ->add("condition")
            ->add("forNight");
    }

    public function getFormTheme()
    {
        return array_merge(
            parent::getFormTheme(),
            array('GdrAdministrationBundle:Form:admin_file_type.html.twig')
        );
    }
}