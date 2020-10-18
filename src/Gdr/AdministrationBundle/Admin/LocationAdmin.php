<?php

namespace Gdr\AdministrationBundle\Admin;

use Doctrine\ORM\EntityRepository;
use Gdr\GameBundle\Entity\Location;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class LocationAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add("name")
            ->add("type", 'choice', array('choices' => Location::getTypes()))
            ->add("description", 'ckeditor')
            ->add("descriptionMap", 'ckeditor', array('required' => false))
            ->add("allowSoul", null, array('required' => false))
            ->add("isStreet", null, array('required' => false))
            ->add("isActive", null, array('required' => false, 'help' => "Se non spuntato fa sparire la location."))
            ->add("isClosed", null, array('required' => false, 'help' => "Se spuntato chiuderà la chat per tutti sempre e comunque."))
            ->add("requireKey", null, array('required' => false, 'help' => "Se spuntato rende accesibile la chat solo se si possiede la chiave."))
            ->add("enclave", null, array("required" => false, "help" => "Se di tipo enclave privata, scegli chi entra in automatico senza chiave."))
            ->add(
                'map',
                'admin_file',
                array('help' => 'Da inserire solo se di tipo Mappa con pallini', 'required' => false)
            )
            ->add(
                'mapNight',
                'admin_file',
                array('help' => 'Da inserire solo se di tipo Mappa con pallini (Notturna)', 'required' => false)
            )
            ->add(
                'icon',
                'admin_file',
                array('required' => false)
            )
            ->add('parentMap', 'entity', array(
                    "help" => "Se è una location da posizionare, scegli la mappa in cui dovrà apparire.",
                    "class" => "GdrGameBundle:Location",
                    'query_builder' => function(EntityRepository $er) {
                        return $er->createQueryBuilder('l')
                            ->andWhere('l.type = :teon OR l.type = :under')
                            ->setParameters(array(
                                   'teon' => Location::TYPE_TEON,
                                    'under' => Location::TYPE_TEON_UNDER
                                ));
                    },
                    "required" => false
                ))
            ->add('subChat')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add("name")
            ->add('type', null, array(), 'choice', array('choices' => Location::getTypes()))
            ->add("allowSoul")
            ->add("isActive")
            ->add('parentMap')
            ->add("requireKey")
        ;

    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier("name")
            ->add('getTypeName')
            ->add("allowSoul")
            ->add("isActive")
            ->add('parentMap')
            ->add("requireKey")
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