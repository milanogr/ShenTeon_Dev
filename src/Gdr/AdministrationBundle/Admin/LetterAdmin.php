<?php

namespace Gdr\AdministrationBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class LetterAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add("sender")
            ->add("senderName")
            ->add("receiver")
            ->add("body", "ckeditor")
            ->add("isRead")
            ->add("isDeleted");
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add("sender")
            ->add("senderName")
            ->add("receiver")
            ->add("isRead")
            ->add("isDeleted")
            ->add("createdAt");
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier("id")
            ->add("sender")
            ->add("senderName")
            ->add("receiver")
            ->add("body", "ckeditor")
            ->add("isRead")
            ->add("isDeleted")
            ->add("createdAt");
    }

}