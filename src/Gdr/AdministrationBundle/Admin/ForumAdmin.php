<?php

namespace Gdr\AdministrationBundle\Admin;

use Gdr\GameBundle\Entity\Forum;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class ForumAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', null)
            ->add('type', 'choice', array('choices' => Forum::getTypes(), 'required' => true))
            ->add('isActive', null, array('required' => false))
            ->add('sorting')
            ->add(
                'enclave',
                null,
                array('help' => 'Se il tipo è Enclave o Clan, seleziona quale potrà vedere questo Forum.')
            )
            ->add('allowSoul', null, array('required' => false));
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('type', 'doctrine_orm_choice', array(), 'choice', array('choices' => Forum::getTypes()))
            ->add('enclave')
            ->add('sorting')
            ->add('isActive')
            ->add('allowSoul');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
            ->add('type')
            ->add('isActive')
            ->add('sorting')
            ->add('enclave')
            ->add('allowSoul');
    }

    public function getFormTheme()
    {
        return array_merge(
            parent::getFormTheme(),
            array('GdrAdministrationBundle:Form:admin_file_type.html.twig')
        );
    }
}