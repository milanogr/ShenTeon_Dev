<?php
namespace Gdr\AdministrationBundle\Admin;

use Gdr\ItemsBundle\Entity\Item;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class ItemAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Caratteristiche generali', array('description' => 'Le caratteristiche generali dell\'oggetto.'))
            ->add('type', null, array('required' => true, 'label' => 'Categoria'))
            ->add('name', null, array('label' => 'Nome'))
            ->add('shortDescription', null, array('label' => 'Descrizione breve'))
            ->add('longDescription', "ckeditor", array('label' => 'Descrizione estesa (popup)'))
            ->add(
                'image',
                'admin_file',
                array('data_class' => 'Symfony\Component\HttpFoundation\File\File', 'required' => false)
            )
            ->add(
                'bigImage',
                'admin_file',
                array('required' => false, 'data_class' => 'Symfony\Component\HttpFoundation\File\File')
            )
            ->add('activeDescription', null, array('required' => false, 'help' => 'Descrizione se attivabile'))
            ->add(
                'showActiveDescription',
                null,
                array(
                    'required' => false,
                    'label' => 'Mostro la descrizione Attiva?',
                    'help' => 'Se spuntata visualizzerà la descrizione Attiva in Inventario/Mercato.'
                )
            )
            ->add('expendableDescription', null, array('required' => false, 'label' => 'Descrizione se sacrificabile'))
            ->add(
                'showExpendableDescription',
                null,
                array(
                    'required' => false,
                    'label' => 'Mostro la descrizione Sacrifica?',
                    'help' => 'Se spuntata visualizzerà la descrizione Sacrifica in Inventario.'
                )
            )
            ->add('weight', null, array('label' => 'Peso/Ingrombro'))
            ->add(
                'durationDays',
                null,
                array(
                    'label' => 'Giorni di durata',
                    'help' => 'Indica dopo quanti giorni dall\'acquisto l\'oggetto sarà automaticamente distrutto.'
                )
            )
            ->add('isTransferable', null, array('required' => false, 'label' => 'Trasferibile ad altri?'))
            ->add('isTransportable', null, array('required' => false, 'label' => 'Trasportabile in borsa?'))
            ->add('isDestructible', null, array('required' => false, 'label' => 'Distruttibile dal proprietario?'))
            ->add('isBaseItem', null, array('required' => false, 'help' => 'Se selezionato, viene messo nell\'inventario del pg creato.'))
            ->add('removeOnDeath', null, array('required' => false, 'help' => 'Se selezionato, quando giunge un parente il pg perde questo oggetto.'))
            ->end()
            ->with('Gestione Vestito', array('description' => 'Il pannello per renderlo un vestito.'))
            ->add('isDress', null, array('required' => false))
            ->add(
                'dressIconImage',
                'admin_file',
                array('required' => false, 'data_class' => 'Symfony\Component\HttpFoundation\File\File')
            )
            ->end()
            ->with('Magia')
            ->add(
                'grimoryLevel',
                'choice',
                array('choices' => Item::getGrimoryLevels(), 'required' => false, 'label' => 'Livello Grimorio')
            )
            ->add('addMana', null, array('required' => false, 'label' => 'Quantità di mana'))
            ->end()
            ->with('Aggiungi Permessi', array('description' => 'Scegli quali sono i permessi dell\'oggetto.'))
            ->add('thiefLevel', 'choice', array('choices' => Item::getLevels(), 'required' => false))
            ->add(
                'emporiumLevel',
                'choice',
                array('choices' => Item::getLevels(), 'required' => false, 'label' => 'Livello Emporio')
            )
            ->add(
                'blackMarketLevel',
                'choice',
                array('choices' => Item::getLevels(), 'required' => false, 'label' => 'Livello Mercato Nero')
            )
            ->add(
                'potionMarketLevel',
                'choice',
                array('choices' => Item::getLevels(), 'required' => false, 'label' => 'Livello Mercato Pozioni')
            )
            //->add('newRace')
            ->add("canMarry", null, array('required' => false))
            ->add('canFate', null, array('required' => false, 'label' => 'Fato'))
            ->add('canModerateChat', null, array('required' => false, 'label' => 'Moderatore Chat'))
            ->add('canModerateForum', null, array('required' => false, 'label' => 'Moderatore Forum'))
            ->add('canAraldo', null, array('required' => false))
            ->add('canAccessLocation', null, array('required' => false))
            ->end()
            ->with(
                'Gestione Mercato',
                array('description' => 'Se sarà venduto nel mercato, questa è la sezione adatta.')
            )
            ->add(
                'isSellable',
                null,
                array(
                    'required' => false,
                    'label' => 'Attivo al mercato?',
                    'help' => 'Se spuntato, l\'oggetto sarà visibile al mercato.'
                )
            )
            ->add(
                'isResalable',
                null,
                array(
                    'required' => false,
                    'label' => 'Rivendibile al mercato?',
                    'help' => 'Se spuntato, l\'oggetto potrà essere venduto al mercato dal proprietario (solo se l\'oggetto è attivo al mercato).'
                )
            )
            ->add('price', null, array('required' => false, 'label' => 'Prezzo'))
            ->add('quantity', null, array('required' => false, 'label' => 'Quantità'))
            ->add('market', null, array('required' => false, 'label' => 'Mercato'))
            ->add('enclave', null, array('required' => false, 'label' => 'Enclave'))
            ->add('clan', null, array('required' => false, 'label' => 'Enclave Razziale'))
            ->add('level', 'choice', array('choices' => Item::getLevels(), 'required' => false, 'label' => 'Livello'))
            ->end();
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('type')
            ->add('shortDescription')
            ->add('isSellable')
            ->add('price')
            ->add('quantity')
            ->add('market')
            ->add('level')
            ->add('removeOnDeath')
            ->add('isBaseItem')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->addIdentifier('name')
            ->add('type')
            ->add('isSellable')
            ->add('price')
            ->add('quantity')
            ->add('getMarketName', 'string')
            ->add('level')
            ->add('removeOnDeath')
            ->add('isBaseItem')
        ;
    }

    public function createQuery($context = 'list'){
        $query = parent::createQuery($context);
        $query->andWhere(
            $query->expr()->neq($query->getRootAlias() . '.type', ':letterType')
        );
        $query->setParameter('letterType', 33);
        return $query;
    }

    public function getFormTheme()
    {
        return array_merge(
            parent::getFormTheme(),
            array('GdrAdministrationBundle:Form:admin_file_type.html.twig')
        );
    }
}