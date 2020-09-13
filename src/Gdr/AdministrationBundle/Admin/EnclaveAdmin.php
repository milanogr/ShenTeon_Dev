<?php

namespace Gdr\AdministrationBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class EnclaveAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', null, array('label' => 'Nome'))
            ->add('category', null, array('label' => 'Categoria', 'required' => true))
            ->add('banner', 'admin_file', array('label' => 'Stendardo', 'required' => false))
            ->add('shield', 'admin_file', array('required' => false))
            ->add('statute', 'ckeditor', array('label' => 'Statuto'))
            ->add('annex', 'ckeditor', array('label' => 'Allegato', 'required' => false))
            ->add(
                'maxMembers',
                null,
                array('label' => 'Limite membri', 'required' => false, 'help' => 'Lasciare vuoto per rimuore il limite')
            )
            ->add('isActive', null, array('label' => 'Mostro nella lista enclavi?', 'required' => false))
            ->add('isClan', null, array('label' => 'E\' un Enclave Razziale?', 'required' => false))
            ->add('notOfficial', null, array('label' => 'E\' un Enclave non istutizionale?', 'required' => false));
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name', null, array('label' => 'Nome'))
            ->add('category', null, array('label' => 'Categoria'))
            ->add('isActive')
            ->add('isClan')
            ->add('notOfficial');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name', null, array('label' => 'Nome'))
            ->add('category', null, array('label' => 'Categoria'))
            ->add('isActive')
            ->add('isClan')
            ->add('notOfficial');
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