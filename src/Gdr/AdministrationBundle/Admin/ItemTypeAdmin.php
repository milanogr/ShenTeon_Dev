<?php
namespace Gdr\AdministrationBundle\Admin;

use Gdr\ItemsBundle\Entity\ItemType;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class ItemTypeAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name')
            ->add(
                'image',
                'admin_file',
                array('data_class' => 'Symfony\Component\HttpFoundation\File\File', 'required' => false)
            )
            ->add('markets', null, array('required' => true))
            ->add('hideFromMarkets', null, array('required' => false))
            ->add('showInChat', null, array('required' => false, 'help' => 'Se equipaggiato, mostra l\'oggetto in chat come popup'))
            ->end()
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('hideFromMarkets')
            ->add('showInChat');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
            ->add('hideFromMarkets')
            ->add('showInChat');
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