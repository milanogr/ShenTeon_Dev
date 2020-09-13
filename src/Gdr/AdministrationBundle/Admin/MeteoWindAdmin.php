<?php

namespace Gdr\AdministrationBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

class MeteoWindAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add("name")
            ->add("isRandom", null, array("help" => "Viene usato automaticamente dal sistema? (Esempio: un uragano non andrebbe messo random)"))
            ->add(
                'image',
                'admin_file',
                array('data_class' => 'Symfony\Component\HttpFoundation\File\File', 'required' => false)
            );
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper;

    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier("name")
            ->add("isRandom");
    }

    public function getFormTheme()
    {
        return array_merge(
            parent::getFormTheme(),
            array('GdrAdministrationBundle:Form:admin_file_type.html.twig')
        );
    }
}