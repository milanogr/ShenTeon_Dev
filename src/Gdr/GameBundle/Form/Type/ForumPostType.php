<?php

namespace Gdr\GameBundle\Form\Type;

use Doctrine\Bundle\DoctrineBundle\Registry;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManager;
use Gdr\GameBundle\Entity\Forum;
use Gdr\GameBundle\Entity\ForumPost;
use Gdr\GameBundle\Entity\ForumThread;
use Gdr\GameBundle\Permission;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Security\Core\SecurityContext;

class ForumPostType extends AbstractType
{
    /**
     * @var \Doctrine\Bundle\DoctrineBundle\Registry
     */
    protected $doctrine;

    /**
     * @var \Gdr\GameBundle\Permission
     */
    protected $permission;

    protected $pgId;

    /**
     * @var \Gdr\GameBundle\Entity\ForumThread
     */
    protected $thread;

    /**
     * Sto editando questo Post?
     *
     * @var bool
     */
    protected $isEdit;


    public function __construct(
        Registry $doctrine,
        Permission $permission,
        $pgId,
        ForumThread $thread = null,
        $isEdit = false
    ) {
        $this->doctrine   = $doctrine;
        $this->permission = $permission;
        $this->pgId       = $pgId;
        $this->thread     = $thread;
        $this->isEdit     = $isEdit;
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'forum_post';
    }

    public function buildForm( FormBuilderInterface $builder, array $options )
    {
        $isSpecial = false;

        $categoryName = $this->thread->getCategory()->getName();

        if ($categoryName == Forum::TYPE_ARALDO || $categoryName == Forum::TYPE_STRILLONE) {
            $isSpecial = true;
        }

        $builder->addEventListener(
            FormEvents::POST_SET_DATA,
            function ( FormEvent $event ) {

                $form = $event->getForm();

                // Nel caso il form sia figlio di FormThread, istanzio il Post.
                if (null === $event->getData()) {
                    $event->setData( new ForumPost() );
                }

                $data = $event->getData();

                if ($data->getIsFirstPost() && $this->isEdit) {
                    $form->add(
                        'threadForm',
                        new ForumThreadType( $this->doctrine, $this->permission, $this->pgId, $this->thread ),
                        array( 'label' => ' ', 'data' => $data->getThread() )
                    );
                }
            }
        );

        if ($this->permission->isAdmin()) {
            $builder
                ->add( 'body', 'ckeditor', array( 'label' => ' ' ) );
        } else {
            $builder
                ->add( 'body', 'ckeditor', array( 'config_name' => 'base', 'label' => ' ' ) );
        }

        // Special significa che è Strillone o Araldo, dunque non ho bisogno di queste cose.
        if (false === $isSpecial) {
            // Queste azioni appaiono sempre quando creo, ma solo se sono l'owner in EDIT.
            // Se sono gestore, posso scrivere come tale.
            if (false === $this->isEdit) {
                if ($this->permission->isAdmin()) {
                    $builder->add(
                        'nameAsAdmin',
                        null,
                        array( 'label' => 'Scrivi come Gestore', 'required' => false )
                    );
                }

                if ($this->permission->isModForum()) {
                    $builder->add(
                        'nameAsMod',
                        null,
                        array( 'label' => 'Scrivi come Moderatore', 'required' => false )
                    );
                }
            } elseif ($this->isEdit && $builder->getData()->getAuthor()->getId() == $this->pgId) {
                if ($this->permission->isAdmin()) {
                    $builder->add(
                        'nameAsAdmin',
                        null,
                        array( 'label' => 'Scrivi come Gestore', 'required' => false )
                    );
                }
                if ($this->permission->isModForum()) {
                    $builder->add(
                        'nameAsMod',
                        null,
                        array( 'label' => 'Scrivi come Moderatore', 'required' => false )
                    );
                }
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions( OptionsResolverInterface $resolver )
    {
        $resolver->setDefaults(
            array(
                'data_class'         => 'Gdr\GameBundle\Entity\ForumPost',
                'csrf_protection'    => true,
                'cascade_validation' => true,
            )
        );
    }
}