<?php
/**
 * Created by JetBrains PhpStorm.
 * User: diego
 * Date: 06/09/13
 * Time: 22:47
 * To change this template use File | Settings | File Templates.
 */

namespace Gdr\AdministrationBundle\Admin;

use Gdr\ItemsBundle\Entity\Property;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class PropertyAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name')
            ->add('type', 'choice', array('choices' => Property::getTypes()))
            ->add(
                'image',
                'admin_file',
                array('required' => false)
            )
            ->add(
                'chatImage',
                'admin_file',
                array('required' => false, "help" => "Immagine della location da mostrare.")
            )
            ->add('description')
            ->add('price')
            ->add('tax')
            ->add('maxPeople')
            ->add('frequencyItems', null, array('help' => 'Gli oggetti assegnabili sono disponibili dall\'altro pannello'))
            ->add('isActive', null, array('required' => false));
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('type', null, array(), 'choice', array('choices' => Property::getTypes()))
            ->add('price')
            ->add('tax')
            ->add('maxPeople')
            ->add('frequencyItems')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
            ->add('getTypeName', 'string')
            ->add('price')
            ->add('maxPeople')
            ->add('tax')
            ->add('frequencyItems')
            ->add('isActive');
    }

    public function getFormTheme()
    {
        return array_merge(
            parent::getFormTheme(),
            array('GdrAdministrationBundle:Form:admin_file_type.html.twig')
        );
    }
}