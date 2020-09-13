<?php

namespace Gdr\AdministrationBundle\Admin;


use Gdr\UserBundle\Entity\Spell;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class SpellAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', null, array('label' => 'Nome'))
            ->add('category', null, array('label' => 'Categoria', 'required' => true))
            ->add('description', null, array('label' => 'Descrizione Grimorio'))
            ->add('chatDescription', null, array('label' => 'Descrizione Chat'))
            ->add('level', 'choice', array('choices' => Spell::getLevels(), 'label' => 'Livello'))
            ->add('isActive', null, array('label' => "Mostro l'incanto in grimorio?", 'required' => false));
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name', null, array('label' => 'Nome'))
            ->add('category', null, array('label' => 'Categoria'))
            ->add('level', null, array('label' => 'Livello'))
            ->add('isActive', null, array('label' => 'Mostro in grimorio?'));
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name', null, array('label' => 'Nome'))
            ->add('category', null, array('label' => 'Categoria'))
            ->add('level', null, array('label' => 'Livello'))
            ->add('isActive', null, array('label' => 'Mostro in grimorio?'));
    }
}