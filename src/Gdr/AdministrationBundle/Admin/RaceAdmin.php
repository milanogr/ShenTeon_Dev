<?php
namespace Gdr\AdministrationBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class RaceAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', null, array('label' => 'Nome'))
            ->add('publicName', null, array('label' => 'Nome Public'))
            ->add('description', 'ckeditor', array('label' => 'Descrizione'))
            ->add('ageMin', null, array('label' => 'Età min'))
            ->add('ageMax', null, array('label' => 'Età max'))
            ->add('ageDeath', null, array('label' => 'Età morte'))
            ->add('maxStrength', null, array('label' => 'Forza max'))
            ->add('maxWisdom', null, array('label' => 'Saggezza max'))
            ->add('minHeight', null, array('label' => 'Altezza min'))
            ->add('maxHeight', null, array('label' => 'Altezza max'))
            ->add('minWeight', null, array('label' => 'Peso min'))
            ->add('maxWeight', null, array('label' => 'Peso max'))
            ->add('monthToOlder')
            ->add('isActive', null, array('required' => false, 'label' => 'E\' attiva?', 'help'=>'Se spuntato, visualizza la razza per le nuove registrazioni.'))
            ->add('useRaceLanguage', null, array('required' => false, 'help'=>'Se spuntato, i nuovi pg impareranno automaticamente questo lingua.'))
            ->add('isWerewolf', null, array('required' => false))
            ->add('isKillableRandomly', null, array('required' => false, 'label' => 'Può morire random?'))
            ->end()
            ->with('Gestione Immagini')
                ->add('maleIcon', 'admin_file', array('data_class' => 'Symfony\Component\HttpFoundation\File\File', 'required' => false, 'label' => 'Icona maschio'))
                ->add('femaleIcon', 'admin_file', array('data_class' => 'Symfony\Component\HttpFoundation\File\File', 'required' => false, 'label' => 'Icona femmina'))
                ->add('maleRealIcon', 'admin_file', array('data_class' => 'Symfony\Component\HttpFoundation\File\File', 'required' => false))
                ->add('femaleRealIcon', 'admin_file', array('data_class' => 'Symfony\Component\HttpFoundation\File\File', 'required' => false))
                ->add('maleImage', 'admin_file', array('data_class' => 'Symfony\Component\HttpFoundation\File\File', 'required' => false, 'label' => 'Avatar di default Uomo'))
                ->add('femaleImage', 'admin_file', array('data_class' => 'Symfony\Component\HttpFoundation\File\File', 'required' => false, 'label' => 'Avatar di default Donna'))
            ->end()
            ->with('Gestione Colori')
                ->add('eyeColors', 'sonata_type_model',array(
                    'choices_as_values' => true,
                    'expanded' => true,
                    'compound' => true, 'multiple' => true, 'label' => 'Colore occhi'))
                ->add('hairColors', 'sonata_type_model',array(
                    'choices_as_values' => true,
                    'expanded' => true, 'compound' => true, 'multiple' => true, 'label' => 'Colore capelli'))
                ->add('skinColors', 'sonata_type_model',array(
                    'choices_as_values' => true,
                    'expanded' => true, 'compound' => true, 'multiple' => true, 'label' => 'Colore pelle'))
                ->add('furColors', 'sonata_type_model',array(
                    'choices_as_values' => true,
                    'expanded' => true, 'compound' => true, 'multiple' => true, 'label' => 'Colore peli'))
                ->add('squamaColors', 'sonata_type_model',array(
                    'choices_as_values' => true,
                    'expanded' => true, 'compound' => true, 'multiple' => true, 'label' => 'Colore squame'))
            ->end()
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add("id")
            ->add('name', null, array('label' => 'Nome'))
            ->add('publicName', null, array('label' => 'Nome Public'))
            ->add('ageMin')
            ->add('ageMax')
            ->add('ageDeath')
            ->add('maxStrength')
            ->add('maxWisdom')
            ->add('minHeight')
            ->add('minWeight')
            ->add('maxWeight')
            ->add('monthToOlder')
            ->add('isActive')
            ->add('useRaceLanguage')
            ->add('isWerewolf')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add("id")
            ->addIdentifier('name', null, array('label' => 'Nome'))
            ->add('publicName', null, array('label' => 'Nome Public'))
            ->add('ageMin')
            ->add('ageMax')
            ->add('ageDeath')
            ->add('maxStrength')
            ->add('maxWisdom')
            ->add('minHeight')
            ->add('minWeight')
            ->add('maxWeight')
            ->add('monthToOlder')
            ->add('isActive')
            ->add('useRaceLanguage')
            ->add('isWerewolf')
            ->add('isKillableRandomly', null, array('label' => 'Morte random'))
        ;
    }

    public function getFormTheme(){
        return array_merge(
            parent::getFormTheme(),
            array('GdrAdministrationBundle:Form:admin_file_type.html.twig')
        );
    }
}