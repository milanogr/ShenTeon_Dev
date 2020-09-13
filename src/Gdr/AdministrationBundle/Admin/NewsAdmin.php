<?php

namespace Gdr\AdministrationBundle\Admin;

use Gdr\GameBundle\Entity\Forum;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class NewsAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title')
            ->add('slug', null, array('help' => 'Il testo che andrà a comporre l\'url della news. Si crea da solo.', 'required' => false))
            ->add('preBody', null, array('help' => 'Un testo di anteprima da far apparire nella lista delle news.'))
            ->add('body', 'ckeditor')
            ->add('isNews', null, array('required' => false))
            ->add('isArchivio', null, array('required' => false))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('slug')
            ->add('title')
            ->add('preBody')
            ->add('isNews')
            ->add('isArchivio');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('slug')
            ->add('title')
            ->add('preBody')
            ->add('isNews')
            ->add('isArchivio');
    }

    public function getFormTheme()
    {
        return array_merge(
            parent::getFormTheme(),
            array('GdrAdministrationBundle:Form:admin_file_type.html.twig')
        );
    }
}