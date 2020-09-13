<?php

namespace Gdr\AdministrationBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class SurnameAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('value', null, array('label' => 'Cognome'))
            ->add('race', null, array('label' => 'Razza', 'required' => true))
            ->add(
                'isActive',
                null,
                array(
                    "required" => false,
                    'label' => 'E\' attivo?',
                    'help' => 'Se selezionato sarà visibile durante la registrazione.'
                )
            );
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('value', null, array('label' => 'Cognome'))
            ->add('race', null, array('label' => 'Razza'))
            ->add('isActive', null, array('label' => 'E\' attivo?'));
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('value', null, array('label' => 'Cognome'))
            ->add('race', null, array('label' => 'Razza'))
            ->add('isActive', null, array('label' => 'E\' attivo?'));
    }

}