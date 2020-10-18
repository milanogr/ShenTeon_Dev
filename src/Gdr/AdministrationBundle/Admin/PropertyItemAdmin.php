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

class PropertyItemAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('item', null, array('attr' => array('class' => 'select2')))
            ->add('property', null, array('attr' => array('class' => 'select2')))
            ->add('quantity');
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('item')
            ->add('property')
            ->add('quantity');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('property')
            ->add('item')
            ->add('quantity');
    }

    public function getFormTheme()
    {
        return array_merge(
            parent::getFormTheme(),
            array('GdrAdministrationBundle:Form:admin_file_type.html.twig')
        );
    }
}