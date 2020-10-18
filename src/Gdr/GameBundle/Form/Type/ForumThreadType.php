<?php

namespace Gdr\GameBundle\Form\Type;

use Doctrine\Bundle\DoctrineBundle\Registry;
use Doctrine\ORM\EntityRepository;
use Doctrine\Tests\Models\Forum\ForumCategory;
use Gdr\GameBundle\Entity\Forum;
use Gdr\GameBundle\Entity\ForumThread;
use Gdr\GameBundle\Permission;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ForumThreadType extends AbstractType
{
    protected $doctrine;
    /**
     * @var \Gdr\GameBundle\Permission
     */
    protected $permission;
    protected $pgId;
    protected $thread;
    protected $isNewThread;

    /**
     * @param Registry    $doctrine
     * @param Permission  $permission
     * @param             $pgId
     * @param ForumThread $thread
     * @param bool        $isNewThread
     */
    public function __construct(
        Registry $doctrine,
        Permission $permission = null,
        $pgId,
        ForumThread $thread = null,
        $isNewThread = false
    ) {
        $this->doctrine = $doctrine;
        $this->permission = $permission;
        $this->pgId = $pgId;
        $this->thread = $thread;
        $this->isNewThread = $isNewThread;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $isSpecial = false;
        // Se è special devo saperlo.
        if ($this->thread) {
            $categoryName = $this->thread->getCategory()->getName();

            if ($categoryName == Forum::TYPE_ARALDO || $categoryName == Forum::TYPE_STRILLONE) {
                $isSpecial = true;
            }
        }

        // Sto modificando un Post.
        if (false === $this->isNewThread) {
            // Questo Listener serve per quando il form viene richiamato dall'azione EditPost + isFirstPost = true.
            $builder->addEventListener(
                FormEvents::POST_SET_DATA,
                function (FormEvent $event) {

                    $isSpecial = false;
                    // Se è special devo saperlo.
                    if ($this->thread) {
                        $categoryName = $this->thread->getCategory()->getName();

                        if ($categoryName == Forum::TYPE_ARALDO || $categoryName == Forum::TYPE_STRILLONE) {
                            $isSpecial = true;
                        }
                    }

                    $form = $event->getForm();

                    // IN strillone non ci va questo.
                    if ($isSpecial === false) {
                        if ($this->permission->isAdmin()) {
                            $form->add(
                                'category',
                                null,
                                array('label' => 'Sposta in un\' altra categoria', 'required' => true)
                            );
                        // Mostro le categorie solo dell'Enclave se sono Master o Vice.
                        } elseif (
                        $this->thread->getCategory()->getForum()->getEnclave() &&
                            $this->permission->isModForum(null, $this->thread)
                        ) {
                            $enclave = $this->thread->getCategory()->getForum()->getEnclave();

                            $categories = $this->doctrine->getRepository('GdrGameBundle:ForumCategory')
                                ->findEnclaveForumCategories($enclave->getId());
                            $array = array();

                            foreach ($categories as $cat){
                                $array[$cat->getId()] = $cat->getName();
                            }

                            $form->add(
                                'category',
                                'entity',
                                array(
                                    'class' => 'GdrGameBundle:ForumCategory',
                                    'query_builder' => function(EntityRepository $er) use($enclave) {
                                        return $er->createQueryBuilder('fc')
                                            ->innerJoin("fc.forum", "f")
                                            ->andWhere("f.enclave = :enclave")
                                            ->setParameter("enclave", $enclave->getId());
                                    },
                                    'label' => 'Sposta in un\' altra categoria',
                                    'required' => true
                                )
                            );
                        // Altrimenti quelle per moderatori.
                        } elseif ($this->permission->isModForum()) {

                            $form->add(
                                'category',
                                'entity',
                                array(
                                    'class' => 'GdrGameBundle:ForumCategory',
                                    'query_builder' => function(EntityRepository $er) {
                                        return $er->createQueryBuilder('fc')
                                            ->innerJoin('GdrGameBundle:Forum', 'f', 'WITH', 'f.id = fc.forum')
                                            ->andWhere('f.type = :public OR f.type = :mod')
                                            ->setParameter('public', Forum::TYPE_PUBLIC)
                                            ->setParameter('mod', Forum::TYPE_MOD);
                                    },
                                    'label' => 'Sposta in un\' altra categoria',
                                    'required' => true
                                )
                            );
                        }
                    }
                }
            );
        }

        $builder->add(
            'title',
            null,
            array(
                'label' => 'Titolo della discussione'
            )
        );

        if ($this->isNewThread) {
            $builder->add(
                'post',
                new ForumPostType($this->doctrine, $this->permission, $this->pgId, $this->thread),
                array('required' => false, 'label' => ' ')
            );
        }

        if (($this->permission->isModForum() || $this->permission->isModForum(null, $this->thread)) && $isSpecial === false) {
            $builder->add(
                'isLocked',
                null,
                array('label' => 'Chiudi la discussione', 'required' => false)
            );
            $builder->add(
                'status',
                'choice',
                array('label' => 'Status', 'required' => true, 'choices' => ForumThread::getAllStatus())
            );
        }

    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'forum_thread';
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'Gdr\GameBundle\Entity\ForumThread',
                'csrf_protection' => true,
                'cascade_validation' => true,
            )
        );
    }

}