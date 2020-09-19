<?php

namespace Gdr\AvatarBundle\Form\Type;

use Gdr\RaceBundle\Entity\Race;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ManagementCommonType extends AbstractType
{
    private $race;

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'management_common_form';
    }

    public function __construct(Race $race = null)
    {
        $this->race = $race;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('avatar', null, array('label' => 'Carica immagine avatar (300x300, max 300KB)'))
			->add('nameExtended', null, array('label' => 'Nome esteso'))
            ->add('activity', null, array('label' => 'Attività'))
            ->add('relationship', null, array('label' => 'Parentele'))
            ->add('friendship', null, array('label' => 'Amicizie'))
			->add('music', null, array('label' => 'Musica - Inserisci codice alfanumerico di un url di YouTube'))
			->add('musicName', null, array('label' => 'Autore e Nome della tua colonna sonora'))
			->add('hideEnclave', null, array('label' => 'Nasconditi da Enclave'))
            ->add('hideClan', null, array('label' => 'Nasconditi da Enclave Razziale'))
		->add('hideFamily', null, array('label' => 'Nasconditi da Enclave Familiare'))
            ->add('description', 'textarea', array('label' => 'Descrizione estesa'))
			
		;
		

        if ($this->race->getMaleRealIconName() && $this->race->getFemaleRealIconName()) {
            $builder->add(
                'useRealRace',
                null,
                array('label' => "Se spuntata, mostra in chat il simbolo della Razza reale del Personaggio")
            );
        }
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'Gdr\UserBundle\Entity\Personage'
            )
        );
    }
}
