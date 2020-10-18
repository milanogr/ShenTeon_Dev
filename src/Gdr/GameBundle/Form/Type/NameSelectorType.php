<?php

namespace Gdr\GameBundle\Form\Type;

use Gdr\GameBundle\Form\DataTransformer\PersonageToNameTransformer;
use JMS\DiExtraBundle\Annotation\FormType;
use JMS\DiExtraBundle\Annotation\Inject;
use JMS\DiExtraBundle\Annotation\Tag;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * @FormType
 * @Tag("name_selector", attributes = {"name" = "form.type"})
 */
class NameSelectorType extends AbstractType
{
    /**
     * @Inject("doctrine.orm.entity_manager")
     * @var \Doctrine\ORM\EntityManager
     */
    public $em;

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $transformer = new PersonageToNameTransformer($this->em);
        $builder->addModelTransformer($transformer);
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'invalid_message' => 'Il personaggio scelto non esiste.',
            )
        );
    }

    public function getParent()
    {
        return 'text';
    }

    public function getName()
    {
        return "name_selector";
    }
}