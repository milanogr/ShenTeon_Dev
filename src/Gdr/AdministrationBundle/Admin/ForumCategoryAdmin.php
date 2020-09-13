<?php

namespace Gdr\AdministrationBundle\Admin;

use Gdr\GameBundle\Entity\Forum;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Gdr\GameBundle\Entity\ForumCategory;

class ForumCategoryAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name')
            ->add('description')
            ->add('isActive', null, array('required' => false))
            ->add(
                'levelMin',
                null,
                array(
                    'help' => 'Se il tipo di Forum è Enclave o Clan, puoi scegliere da che livello questa sezione sarà visualizzata'
                )
            )
            ->add('sort', null, array('required' => false))
            ->add('isJunk', null, array('required' => false))
            ->add('helpDesk', 'choice', array('required' => false, 'choices' => ForumCategory::getHelpDesks(), 'help' => 'Max 1 per tipo, non toccare per sicurezza'))
            ->add('forum');
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('isActive')
            ->add(
                'levelMin'
            )
            ->add('forum')
            ->add('sort');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name', null)
            ->add('isActive', null, array('required' => false))
            ->add(
                'levelMin',
                null,
                array(
                    'label' => 'Livello minimo',
                )
            )
            ->add('helpDesk')
            ->add('sort')
            ->add('forum', null);
    }

    public function getFormTheme()
    {
        return array_merge(
            parent::getFormTheme(),
            array('GdrAdministrationBundle:Form:admin_file_type.html.twig')
        );
    }
}