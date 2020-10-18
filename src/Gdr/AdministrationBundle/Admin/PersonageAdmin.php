<?php
namespace Gdr\AdministrationBundle\Admin;

use Gdr\ItemsBundle\Entity\Item;
use Gdr\UserBundle\Entity\Personage;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class PersonageAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', null, array('label' => 'Nome'))
            ->add('surname', null, array('label' => 'Cognome', 'required' => false))
            ->add('title')
            ->add('status')
            ->add('description', null, array('label' => 'Descrizione'))
            ->add('avatar', 'admin_file', array('required' => false, 'label' => 'Avatar'))
            ->add('nameExtended', null, array('label' => 'Nome Esteso'))
            ->add('activity', null, array('label' => 'Attività'))
            ->add('gender', 'choice', array('label' => 'Sesso', 'required' => true, 'choices' => Personage::getGenders()))
            ->add('experience', null, array('label' => 'Esperienza'))
            ->add('globalExperience', null)
            ->add("carisma")
            ->add("isExWarrior", null, array('required' => false))
            ->add("combatPoints")
            ->add('relationship', null, array('label' => 'Relazione'))
            ->add('friendship', null, array('label' => 'Amicizie'))
            ->add('bankAmount', null, array('label' => 'Conto Banca'))
            ->add('bagAmount', null, array('label' => 'Conto Borsa'))
            ->add('raceLevel', null, array('label' => 'Livello Razza'))
            ->add('combatLevel', null, array('label' => 'Livello Combattente'))
            ->add('skillsLevel', null, array('label' => 'Livello Attributi'))
            ->add('canStudyGrimoryAt', null, array('label' => 'Prossimo studio del grimorio', 'help' => 'Per resettare basta mettere un giorno indietro.'))
            ->add('enclaveRank', null, array('label' => 'Carica di Enclave'))
            ->add('clanRank', null, array('label' => 'Carica di Clan'))
            ->add('fateNote')
            ->add('createdAt')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('user')
            ->add('name')
            ->add('surname')
            ->add('raceLevel')
            ->add('carisma')
            ->add('combatLevel')
            ->add('bankAmount', null, array('label' => 'Conto Banca'))
            ->add('bagAmount', null, array('label' => 'Conto Borsa'))
            ->add('experience', null, array('label' => 'Esperienza'));
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('name')
            ->add('user')
            ->add('gender', null, array('label' => 'Sesso', 'required' => true))
            ->add('bankAmount', null, array('label' => 'Conto Banca'))
            ->add('bagAmount', null, array('label' => 'Conto Borsa'));
    }

    public function getFormTheme(){
        return array_merge(
            parent::getFormTheme(),
            array('GdrAdministrationBundle:Form:admin_file_type.html.twig')
        );
    }
}