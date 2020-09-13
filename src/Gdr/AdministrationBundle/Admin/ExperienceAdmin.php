<?php

namespace Gdr\AdministrationBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class ExperienceAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('personage', null, array('label' => 'Personaggio', 'required' => true))
            ->add('body', null, array('label' => 'Testo', 'required' => true))
            ->add('isInvisible', null, array('label' => 'E\' Invisibile?', 'required' => false, 'help' => 'Se selezionato, sarà invisibile per gli altri.'))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('personage', null, array('label' => 'Personaggio'))
            ->add('body', null, array('label' => 'Testo'))
            ->add('isInvisible', null, array('label' => 'E\' Invisibile?'))
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('personage', null, array('label' => 'Personaggio'))
            ->add('body', null, array('label' => 'Testo'))
            ->add('isInvisible', null, array('label' => 'E\' Invisibile?'))
        ;
    }
}