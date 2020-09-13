<?php

namespace Gdr\AdministrationBundle\Form\Type;

use Symfony\Component\Form\AbstractType;

class AdminFileType extends AbstractType
{

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'admin_file';
    }

    public function getParent()
    {
        return 'file';
    }

}