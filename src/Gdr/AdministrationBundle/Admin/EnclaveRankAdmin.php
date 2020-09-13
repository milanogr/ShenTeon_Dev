<?php

namespace Gdr\AdministrationBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class EnclaveRankAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', null, array('label' => 'Nome carica'))
            ->add('level', null, array('label' => 'Livello', 'attr' => array('style'=>'width: 100% !important')))
            ->add('icon', 'admin_file', array('required' => false, 'label' => 'Icona vestito'))
            ->add('isMaster', null, array('label' => 'E\' Master?', 'required' => false))
            ->add('isViceMaster', null, array('label' => 'E\' Vice Master?', 'required' => false))
            ->add('enclave', null, array('required' => true, 'attr' => array('style'=>'width: 100% !important')))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('enclave')
            ->add('isMaster')
            ->add('isViceMaster')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
            ->add('enclave')
            ->add('isMaster')
            ->add('isViceMaster')
        ;
    }

    public function getFormTheme(){
        return array_merge(
            parent::getFormTheme(),
            array('GdrAdministrationBundle:Form:admin_file_type.html.twig')
        );
    }
}