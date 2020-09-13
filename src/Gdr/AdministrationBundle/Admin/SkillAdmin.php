<?php
namespace Gdr\AdministrationBundle\Admin;

use Gdr\ItemsBundle\Entity\Item;
use Gdr\UserBundle\Entity\Skill;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class SKillAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', null, array('label' => 'Nome'))
            ->add(
                'image',
                'admin_file',
                array(
                    'data_class' => 'Symfony\Component\HttpFoundation\File\File',
                    'required' => false,
                    'label' => 'Immagine'
                )
            )
            ->add('race', null, array('required' => false, 'label' => 'Razza'))
            ->add('level', 'choice', array('required' => true, 'label' => 'Livello', 'choices' => Skill::getLevels()))
            ->add('hoursToReload', null, array('required' => true, 'label' => 'Ore di ricarica'))
            ->add('isRandom', null, array('required' => false))
            ->add('description', null, array('label' => 'Descrizione'));
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('hoursToReload', null, array('label' => 'Ore di ricarica'))
            ->add('race')
            ->add('isRandom')
            ->add('level');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
            ->add('hoursToReload', null, array('label' => 'Ore di ricarica'))
            ->add('race')
            ->add('isRandom')
            ->add('level');
    }

    public function getFormTheme()
    {
        return array_merge(
            parent::getFormTheme(),
            array('GdrAdministrationBundle:Form:admin_file_type.html.twig')
        );
    }
}