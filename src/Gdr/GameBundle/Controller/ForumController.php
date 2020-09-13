<?php

namespace Gdr\GameBundle\Controller;


use Doctrine\ORM\EntityNotFoundException;
use Gdr\GameBundle\Entity\FollowThread;
use Gdr\GameBundle\Entity\Forum;
use Gdr\GameBundle\Entity\ForumCategory;
use Gdr\GameBundle\Entity\ForumPost;
use Gdr\GameBundle\Entity\ForumThread;
use Gdr\GameBundle\Entity\StrilloneReaded;
use Gdr\GameBundle\Form\Type\ForumPostType;
use Gdr\GameBundle\Form\Type\ForumThreadType;
use Gdr\UserBundle\Controller\Controller;
use Gdr\UserBundle\Entity\Personage;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ForumController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $personage = $this->getPersonage();

        $forums = $this->getDoctrine()->getRepository('GdrGameBundle:Forum')
            ->getForumsByType(Forum::TYPE_PUBLIC);

        $enclaveForums = null;
        $clanForums = null;
        $gestioneForums = null;
        $modForums = null;
        $masterForums = null;
        $capoClanForums = null;
        $fateForums = null;
        $allHiddenForums = null;

        if (false !== $personage->hasEnclave()) {
            $enclave = $personage->getEnclaveRank()->getEnclave();
            $level = $personage->getEnclaveRank()->getLevel()->getName();
            $enclaveForums = $this->getDoctrine()->getRepository('GdrGameBundle:Forum')
                ->getForumsByType(Forum::TYPE_ENCLAVE, $enclave->getId(), $level);

            // Master?
            $isMaster = $personage->getEnclaveRank()->getIsMaster();
            $isViceMaster = $personage->getEnclaveRank()->getIsViceMaster();
            if (true === $isMaster || true === $isViceMaster) {
                $masterForums = $this->getDoctrine()->getRepository('GdrGameBundle:Forum')
                    ->getForumsByType(Forum::TYPE_MASTER);
            }
        }

        if (false !== $personage->hasClan()) {
            $enclave = $personage->getClanRank()->getEnclave();
            $level = $personage->getClanRank()->getLevel()->getName();
            $clanForums = $this->getDoctrine()->getRepository('GdrGameBundle:Forum')
                ->getForumsByType(Forum::TYPE_CLAN, $enclave->getId(), $level);

            // Sono CapoClan?
            $isCapoClan = $personage->getClanRank()->getIsMaster();
            if (true === $isCapoClan) {
                $masterForums = $this->getDoctrine()->getRepository('GdrGameBundle:Forum')
                    ->getForumsByType(Forum::TYPE_MASTER);
            }
        }

        if ($this->getPermission()->isAdmin()) {
            $gestioneForums = $this->getDoctrine()->getRepository('GdrGameBundle:Forum')
                ->getForumsByType(Forum::TYPE_GESTIONE);

            $allHiddenForums = $this->getDoctrine()->getRepository('GdrGameBundle:Forum')
                ->getForumsByEnclaveAndClan();
        }

        if ($this->getPermission()->isModForum() || $this->getPermission()->isModChat()) {
            $modForums = $this->getDoctrine()->getRepository('GdrGameBundle:Forum')
                ->getForumsByType(Forum::TYPE_MOD);
        }

        if ($this->getPermission()->isFate()) {
            $fateForums = $this->getDoctrine()->getRepository('GdrGameBundle:Forum')
                ->getForumsByType(Forum::TYPE_FATE);
        }

        return $this->render(
            'GdrGameBundle:Forum:index.html.twig',
            array(
                'forums' => $forums,
                'enclaveForums' => $enclaveForums,
                'clanForums' => $clanForums,
                'gestioneForums' => $gestioneForums,
                'modForums' => $modForums,
                'masterForums' => $masterForums,
                'fateForums' => $fateForums,
                'hiddenForums' => $allHiddenForums
            )
        );
    }

    /**
     * @param $category
     *
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function showThreadsAction(Request $request, $category)
    {
        $category = $this->getDoctrine()->getRepository('GdrGameBundle:ForumCategory')
            ->find($category);

        if (null === $category) {
            throw new NotFoundHttpException();
        }

        $this->canViewForum($category);

        $threads = $this->getDoctrine()->getRepository('GdrGameBundle:ForumThread')
            ->getThreadsByCategory($category->getId(), $this->getPersonage()->getId());

        $count = count($threads->getResult());
        $threads->setHint('knp_paginator.count', $count);

        $isAdmin = $this->get('gdr.permission')->isAdmin();
        $perPage = $category->getId() == 23 && $isAdmin ? 40 : 15;

        $paginator = $this->get('knp_paginator')
            ->paginate($threads, $request->query->get('page', 1), $perPage, array('distinct' => false));

        return $this->render(
            'GdrGameBundle:Forum:threads.html.twig',
            array(
                'paginator' => $paginator,
                'category' => $category,
                'thread',
                'threadImportant' => ForumThread::STATUS_IMPORTANT,
                'threadAnnounce' => ForumThread::STATUS_ANNOUNCE,
                'threadNormal' => ForumThread::STATUS_NORMAL,
                'canWriteSoul' => $this->canSoulWrite($category->getForum())
            )
        );
    }

    /**
     * @param $category
     *
     * @return string|\Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \Doctrine\ORM\EntityNotFoundException
     * @throws \Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException
     */
    public function createThreadAction($category)
    {
        $request = $this->getRequest();
        $category = $this->getDoctrine()->getRepository('GdrGameBundle:ForumCategory')
            ->find($category);

        if (null === $category) {
            throw new EntityNotFoundException();
        }

        $this->canViewForum($category);

        if ($category->getName() == Forum::TYPE_STRILLONE) {
            if (false == $this->getPermission()->isAdmin()) {
                throw new AccessDeniedHttpException();
            }
        } elseif ($category->getName() == Forum::TYPE_ARALDO) {
            if (false == $this->getPermission()->canAraldo()) {
                throw new AccessDeniedHttpException();
            }
        }

        $personage = $this->getPersonage();
        $thread = new ForumThread();
        $thread->setCategory($category);

        $form = $this->createForm(
            new ForumThreadType($this->getDoctrine(), $this->getPermission(), $personage->getId(), $thread, true),
            $thread
        );

        $form->handleRequest($request);

        if ($form->isValid()) {

            if (false === $this->canSoulWrite($thread->getCategory()->getForum())) {
                throw new AccessDeniedHttpException();
            }

            $em = $this->getDoctrine()->getManager();

            // Creo il Post
            $post = $this->createPost($form->get('post')->getData(), $thread, true);

            $em->persist($thread);
            $em->persist($post);
            $em->flush();

            $catName = $thread->getCategory()->getName();
            if ($catName == Forum::TYPE_STRILLONE || $catName == Forum::TYPE_ARALDO) {
                return $this->redirect($this->generateUrl('bacheca-special', array('name' => $catName)));
            } else {
                $this->get('gdr.forum')->setThreadNotReadedForMe($thread, $personage);

                return $this->redirect($this->generateUrl('bacheca-show-thread', array('id' => $thread->getId())));
            }
        }

        $catName = $thread->getCategory()->getName();
        if ($catName == Forum::TYPE_STRILLONE || $catName == Forum::TYPE_ARALDO) {
            $backLink = $this->generateUrl('bacheca-special', array('name' => $catName));
        } else {
            $backLink = null;
        }

        return $this->render(
            'GdrGameBundle:Forum:newThread.html.twig',
            array(
                'form' => $form->createView(),
                'category' => $category->getId(),
                'backLink' => $backLink,
                'canWriteSoul' => $this->getPersonage()->getIsSoul()
            )
        );
    }

    public function showThreadAction($id)
    {
        $thread = $this->getDoctrine()->getRepository('GdrGameBundle:ForumThread')
            ->find($id);

        if (null === $thread) {
            throw new NotFoundHttpException();
        }

        $this->canViewForum($thread->getCategory());
        $firstPost = $this->getDoctrine()->getRepository('GdrGameBundle:ForumThread')
            ->getFirstPostOfThread($thread->getId());

        $isOwner = $firstPost['authorId'] == $this->getPersonage()->getId();

        // Se la categoria è HelpDesk, controllo se sono Gestore, Moderatore o fato o owner.
        $category = $thread->getCategory();
        if (null !== $category->getHelpDesk()) {

            $isAdmin = $this->getPermission()->isAdmin();

            if ($category->getHelpDesk() === ForumCategory::DESK_GESTIONE && !($isAdmin || $isOwner)) {
                throw new EntityNotFoundException();
            } elseif ($category->getHelpDesk() === ForumCategory::DESK_MOD && !($this->getPermission()->isMod() || $isOwner)
            ) {
                throw new EntityNotFoundException();
            } elseif ($category->getHelpDesk() === ForumCategory::DESK_FATE && !($this->getPermission()->isFate() || $isOwner)
            ) {
                throw new EntityNotFoundException();
            }
        }

        $personage = $this->getPersonage();
        $em = $this->getDoctrine()->getManager();

        // Aggiorno il thread.
        $thread->setReaded($thread->getReaded() + 1);
        $em->persist($thread);
        $em->flush();

        // Imposto il thread come letto per me stesso.
        $this->get('gdr.forum')->refreshThreadReaded($personage, $thread);

        // Se lo stavo seguendo, aggiorno.
        $this->get('gdr.forum')->refreshThreadFollowed($thread, $personage);

        // Sono moderatore?
        $isModerator = $this->getPermission()->isModForum(null, $thread, $personage) || $this->getPermission()->isModForum();

        $posts = $this->getDoctrine()->getRepository('GdrGameBundle:ForumPost')
            ->findPostsForPaginator($thread->getId());

        $paginator = $this->get('knp_paginator')
            ->paginate($posts, $this->getRequest()->query->get('page', 1), 15);


        // Sto seguendo il post?
        $following = $this->get('gdr.forum')->isFollowedThread($thread, $personage);

        if ($category->getHelpDesk() !== null) {
            return $this->render(
                'GdrGameBundle:Forum:helpDeskThread.html.twig',
                array(
                    'thread' => $thread,
                    'paginator' => $paginator,
                    'pgId' => $personage->getId(),
                    'isMod' => $isModerator,
                    'threadImportant' => ForumThread::STATUS_IMPORTANT,
                    'threadAnnounce' => ForumThread::STATUS_ANNOUNCE,
                    'helpType' => $category->getHelpDesk(),
                    'following' => $following
                )
            );
        }

        return $this->render(
            'GdrGameBundle:Forum:thread.html.twig',
            array(
                'thread' => $thread,
                'paginator' => $paginator,
                'pgId' => $personage->getId(),
                'isMod' => $isModerator,
                'threadImportant' => ForumThread::STATUS_IMPORTANT,
                'threadAnnounce' => ForumThread::STATUS_ANNOUNCE,
                'canWriteSoul' => $this->canSoulWrite($category->getForum()),
                'following' => $following
            )
        );
    }

    public function createPostAction($thread)
    {
        $request = $this->getRequest();
        $thread = $this->getDoctrine()->getRepository('GdrGameBundle:ForumThread')
            ->find($thread);

        if (null === $thread) {
            throw new NotFoundHttpException();
        }

        if ($thread->getIsLocked() && ($this->getPermission()->isModForum() == false
                && $this->getPermission()->isModForum(null, $thread) == false)
        ) {
            throw new AccessDeniedHttpException();
        }

        $this->canViewForum($thread->getCategory());

        $personage = $this->getPersonage();

        // Recupera la prima risposta da mostrare
        $post = new ForumPost();
        $form = $this->createForm(
            new ForumPostType($this->getDoctrine(), $this->getPermission(), $personage->getId(), $thread),
            $post
        );

        $form->handleRequest($request);

        if ($form->isValid()) {

            if (false === $this->canSoulWrite($thread->getCategory()->getForum())) {
                throw new AccessDeniedHttpException();
            }

            $post = $this->createPost($form->getData(), $thread);

            $em = $this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();


            $url = $this->generateUrl('bacheca-show-thread', array('id' => $thread->getId()));

            $this->get('gdr.forum')->setThreadNotReaded($thread);
            $this->get('gdr.forum')->setThreadNotReadedForMe($thread, $personage);
            $this->get('gdr.forum')->notifyFollowedThread($thread, $url);

            return new JsonResponse(array('url' => $url));
        }

        if ($this->getRequest()->isXmlHttpRequest()) {
            $view = 'GdrGameBundle:Forum:newPost.ajax.html.twig';
        } else {
            $view = 'GdrGameBundle:Forum:newPost.html.twig';
        }

        return $this->render(
            $view,
            array(
                'form' => $form->createView(),
                'thread' => $thread,
                'canWriteSoul' => $this->canSoulWrite($thread->getCategory()->getForum())
            )
        );
    }

    public function deletePostAction($id)
    {
        $post = $this->getDoctrine()->getRepository('GdrGameBundle:ForumPost')
            ->find($id);

        if (null === $post) {
            throw new NotFoundHttpException();
        }

        if (false === $this->canDeletePost($post)) {
            throw new AccessDeniedHttpException();
        }

        $this->canViewForum($post->getThread()->getCategory());

        if (false === $this->canSoulWrite($post->getThread()->getCategory()->getForum())) {
            throw new AccessDeniedHttpException();
        }

        $oldThread = clone $post->getThread();
        $em = $this->getDoctrine()->getManager();
        $threadDeleted = false;
        $postDeleted = false;
        $isJunkCategory = false;

        if ($post->getIsFirstPost()) {
            $isJunkCategory = $post->getThread()->getCategory()->getIsJunk();
            // Se sono nel cestino posso eliminarla definitivamente.
            if ($isJunkCategory) {
                $em->remove($post);
            } else {
                // Se non sono in cestino, la devo spostare li.
                $junkCategory = $em->getRepository('GdrGameBundle:ForumCategory')
                    ->findPrivateJunk();

                $post->getThread()->setCategory($junkCategory);
                $em->persist($post);
            }
            $threadDeleted = true;
        } else {
            // Elimino solo un post normale.
            $em->remove($post);
            $postDeleted = true;
        }

        $em->flush();

        $junkCategory = $em->getRepository('GdrGameBundle:ForumCategory')
            ->findPrivateJunk();

        // Se ho cancellato tutto il thread rimando alla categoria (vecchia se è stato spostato).
        if ($threadDeleted) {
            // Se ho eliminato in cestino, rimando al cestino.
            if ($isJunkCategory) {
                $url = $this->generateUrl(
                    'bacheca-lista-threads',
                    array('category' => $junkCategory->getId())
                );
            } else {
                $this->refreshCategoriesAfterMove($junkCategory, $oldThread->getCategory(), $post);

                // Altrimenti è un falso delete e rimando nella vecchia categoria.
                $url = $this->generateUrl(
                    'bacheca-lista-threads',
                    array('category' => $oldThread->getCategory()->getId())
                );
            }
        } else {
            // Rimando al thread perché ho cancellato un post.
            $url = $this->generateUrl('bacheca-show-thread', array('id' => $post->getThread()->getId()));
        }

        return $this->redirect($url);
    }

    protected function createPost(ForumPost $post, ForumThread $thread, $isFirst = false)
    {
        $this->canViewForum($thread->getCategory());

        if (false === $this->canSoulWrite($thread->getCategory()->getForum())) {
            throw new AccessDeniedHttpException();
        }

        $personage = $this->getPersonage();

        // Creo il Post
        $post->setThread($thread);
        $post->setBody($this->get('gdr.forum')->purifyBody($post->getBody()));
        $post->setAuthor($personage);
        $post->setAuthorName($personage->getName());
        $post->setAuthorRaceName($personage->getRace()->getName());

        if ($personage->getGender() == Personage::MALE) {
            $post->setAuthorRaceIcon($personage->getRace()->getMaleIconName());
        } else {
            $post->setAuthorRaceIcon($personage->getRace()->getFemaleIconName());
        }

        $myRank = $this->getRightRank($personage);
        $post->setAuthorLevelName($myRank['rankName']);
        $post->setAuthorLevelIcon($myRank['rankPathRelative']);

        $em = $this->getDoctrine()->getManager();
        $fs = $this->get('gdr.forum');
        $followed = $fs->isFollowedThread($thread, $personage, true);

        if ($isFirst) {
            $post->setIsFirstPost(true);

            if (!$followed) {
                $fs->followThread($thread, $personage);
            }
        }

        $em->persist($post);
        $em->flush();

        return $post;
    }

    public function editPostAction($id)
    {
        $post = $this->getDoctrine()->getRepository('GdrGameBundle:ForumPost')
            ->find($id);

        if (null === $post) {
            throw new NotFoundHttpException();
        }

        if (false === $this->canEditPost($post)) {
            throw new AccessDeniedHttpException();
        }

        $this->canViewForum($post->getThread()->getCategory());

        $personage = $this->getPersonage();
        $request = $this->getRequest();
        $thread = $post->getThread();
        $category = $thread->getCategory();


        $form = $this->createForm(
            new ForumPostType($this->getDoctrine(), $this->getPermission(), $personage->getId(), $thread, true),
            $post
        );

        $form->handleRequest($request);

        if ($form->isValid()) {

            if (false === $this->canSoulWrite($post->getThread()->getCategory()->getForum())) {
                throw new AccessDeniedHttpException();
            }

            $em = $this->getDoctrine()->getManager();

            if ($post->getIsFirstPost()) {
                $em->persist($form->get('threadForm')->getData());
            }

            // Se io sono l'owner, aggiorno in base al nome già presente.
            // Altrimenti "Moderazione".
            if ($this->isOwner($post)) {
                $post->setUpdatedBy($post->getAuthorName());
            } else {
                if ($this->getSecurityContext()->isGranted('ROLE_ADMIN')) {
                    $post->setUpdatedBy('Gestione');
                } else {
                    $post->setUpdatedBy('Moderazione');
                }
            }

            $em->persist($post);
            $em->flush();

            $catName = $thread->getCategory()->getName();
            if ($catName == Forum::TYPE_STRILLONE || $catName == Forum::TYPE_ARALDO) {
                return $this->redirect($this->generateUrl('bacheca-special', array('name' => $catName)));
            } else {
                return $this->redirect($this->generateUrl('bacheca-show-thread', array('id' => $thread->getId())));
            }
        }

        return $this->render(
            'GdrGameBundle:Forum:editPost.html.twig',
            array(
                'form' => $form->createView(),
                'category' => $category->getId(),
                'isMod' => $this->getPermission()->isModForum($post, null) || $this->getPermission()->isModForum(),
                'isFirstPost' => $post->getIsFirstPost()
            )
        );
    }

    public function showSpecialForumAction($name)
    {
        $categoryName = $name == 'Strillone' ? Forum::TYPE_STRILLONE : Forum::TYPE_ARALDO;
        $category = $this->getDoctrine()->getRepository('GdrGameBundle:ForumCategory')
            ->findOneBy(array('name' => $categoryName));

        if (null === $category) {
            throw new EntityNotFoundException();
        }

        $records = $this->getDoctrine()->getRepository('GdrGameBundle:ForumThread')
            ->getThreadsBySpecial($category->getId());

        $count = count($records->getResult());
        $records = $records->setHint('knp_paginator.count', $count);

        $paginator = $this->get('knp_paginator')
            ->paginate($records, $this->getRequest()->query->get('page', 1), 15, array('distinct' => false));


        $canAraldo = false;
        if ($name == Forum::TYPE_ARALDO) {
            $canAraldo = $this->getPermission()->canAraldo();
            $this->get('gdr.forum')->setAraldoReaded($this->getPersonage());
        } else {
            $this->get('gdr.forum')->setStrilloneReaded($this->getPersonage());
        }

        return $this->render(
            'GdrGameBundle:Forum:strillone.html.twig',
            array(
                'paginator' => $paginator,
                'category' => $category,
                'strillone' => Forum::TYPE_STRILLONE,
                'araldo' => Forum::TYPE_ARALDO,
                'pgId' => $this->getPersonage()->getId(),
                'canAraldo' => $canAraldo,
                'canWriteSoul' => $this->canSoulWrite($category->getForum())
            )
        );
    }

    public function showPrivateForumsAction($id)
    {
        if (!$this->getPermission()->isAdmin()) {
            throw new AccessDeniedHttpException("Accesso negato");
        }

        $enclave = $this->getDoctrine()->getRepository('GdrGameBundle:Enclave')
            ->find($id);

        if (!$enclave) {
            return $this->createNotFoundException("Nessun enclave trovata con ID: " . $id);
        }

        $forums = $this->getDoctrine()->getRepository('GdrGameBundle:Forum')
            ->getForumsByEnclaveOrClan($id);

        return $this->render('GdrGameBundle:Forum:listPrivateForum.html.twig', array('forums' => $forums));
    }

    protected function canEditPost(ForumPost $post)
    {
        $catName = $post->getThread()->getCategory()->getName();

        if (false === $this->canSoulWrite($post->getThread()->getCategory()->getForum())) {
            return false;
        }

        if ($catName == Forum::TYPE_STRILLONE) {
            return $this->getPermission()->isAdmin();
        }

        if ($catName == Forum::TYPE_ARALDO) {
            if ($this->getPermission()->canAraldo() && ($this->isOwner($post) || $this->getPermission()->isAdmin())) {
                return true;
            } else {
                return false;
            }
        }

        if (($this->isOwner($post) && $post->getIsLastPost())
            || $this->getPermission()->isModForum($post, null, $this->getPersonage())
            || $this->getPermission()->isModForum()
        ) {
            return true;
        }

        return false;
    }

    protected function canDeletePost(ForumPost $post)
    {
        $catName = $post->getThread()->getCategory()->getName();

        if (false === $this->canSoulWrite($post->getThread()->getCategory()->getForum())) {
            return false;
        }

        if ($catName == Forum::TYPE_STRILLONE) {
            return $this->getPermission()->isAdmin();
        }

        if ($catName == Forum::TYPE_ARALDO) {
            return $this->getPermission()->canAraldo() && $this->isOwner($post);
        }

        if (($this->isOwner($post) && $post->getIsLastPost())
            || $this->getPermission()->isModForum($post, null, $this->getPersonage())
            || $this->getPermission()->isModForum()
        ) {
            return true;
        }

        return false;
    }

    protected function canViewForum(ForumCategory $category)
    {
        $personage = $this->getPersonage();

        if ($this->getPermission()->isAdmin()) {
            return true;
        }

        switch ($category->getForum()->getType()) {
            case Forum::TYPE_ENCLAVE:
                // Devo essere di quell'enclave ed avere un livello rank pari o superiore.

                if ($personage->hasEnclave() !== $category->getForum()->getEnclave()
                    || $personage->getEnclaveRank()->getLevel()->getName() < $category->getLevelMin()
                ) {
                    throw new AccessDeniedHttpException();
                }

                break;

            case Forum::TYPE_CLAN:
                if ($personage->hasClan() !== $category->getForum()->getEnclave()
                    || $personage->getClanRank()->getLevel()->getName() < $category->getLevelMin()
                ) {
                    throw new AccessDeniedHttpException();
                }

                break;

            case Forum::TYPE_GESTIONE:

                if (false === $this->getSecurityContext()->isGranted('ROLE_ADMIN') && null === $category->getHelpDesk()
                ) {
                    throw new AccessDeniedHttpException();
                }
                break;

            case Forum::TYPE_MASTER:

                $enclaveRank = $personage->getEnclaveRank();
                $clanRank = $personage->getClanRank();

                $canEnclave = false;
                $canClan = false;

                if (null !== $enclaveRank) {
                    $canEnclave = $enclaveRank->getIsMaster() || $enclaveRank->getIsViceMaster();
                }
                if (null !== $clanRank) {
                    $canClan = $clanRank->getIsMaster();
                }

                if (!$canEnclave && !$canClan) {
                    $logger = $this->get('logger');
                    $logger->error("Tentativo di accesso a forum master fallito da parte di " . $personage->getId());
                    throw new AccessDeniedHttpException("Tentativo di accesso a forum master fallito.");
                }

                break;

            case Forum::TYPE_MOD:

                if ($category->getHelpDesk()) {
                    break;
                }

                if (false === $this->getPermission()->isMod()) {
                    $logger = $this->get('logger');
                    $logger->error("Tentativo di accesso a forum mod fallito da parte di " . $personage->getId());
                    throw new AccessDeniedHttpException();
                }
                break;

            case Forum::TYPE_FATE:
                if ($category->getHelpDesk()) {
                    break;
                }

                if (false === $this->getPermission()->isFate()) {
                    $logger = $this->get('logger');
                    $logger->error("Tentativo di accesso a forum fato fallito da parte di " . $personage->getId());
                    throw new AccessDeniedHttpException();
                }
                break;
        }
    }


    public function helpDeskAction($type)
    {
        $em = $this->getDoctrine()->getManager();

        if ($type == 'gestione') {
            $category = $em->getRepository('GdrGameBundle:ForumCategory')
                ->findOneBy(array('helpDesk' => ForumCategory::DESK_GESTIONE));
        } elseif ($type == 'moderazione') {
            $category = $em->getRepository('GdrGameBundle:ForumCategory')
                ->findOneBy(array('helpDesk' => ForumCategory::DESK_MOD));
        } else {
            $category = $em->getRepository('GdrGameBundle:ForumCategory')
                ->findOneBy(array('helpDesk' => ForumCategory::DESK_FATE));
        }

        if (null === $category) {
            $this->createNotFoundException('Riprovare più tardi');
        }

        $threads = $em->getRepository('GdrGameBundle:ForumThread')
            ->getThreadsByHelpdesk($category->getHelpDesk(), $this->getPersonage()->getId());

        $count = count($threads->getResult());
        $threads = $threads->setHint('knp_paginator.count', $count);

        $paginator = $this->get('knp_paginator')
            ->paginate($threads, $this->getRequest()->query->get('page', 1), 15, array('distinct' => false));


        return $this->render(
            'GdrGameBundle:Forum:helpDesk.html.twig',
            array(
                'paginator' => $paginator,
                'category' => $category,
                'thread',
                'threadImportant' => ForumThread::STATUS_IMPORTANT,
                'threadAnnounce' => ForumThread::STATUS_ANNOUNCE,
                'threadNormal' => ForumThread::STATUS_NORMAL,
            )
        );
    }

    protected function isOwner(ForumPost $post)
    {
        return $post->getAuthor() == $this->getPersonage();
    }

    /**
     * @param ForumCategory $newCategory
     * @param ForumCategory $oldCategory
     * @param ForumPost $post
     */
    protected function refreshCategoriesAfterMove(
        ForumCategory $newCategory,
        ForumCategory $oldCategory,
        ForumPost $post
    )
    {

        $em = $this->getDoctrine()->getManager();
        $thread = $post->getThread();

        $newCategoryLastPost = $em->getRepository('GdrGameBundle:ForumPost')
            ->getLastPostOfCategory($newCategory->getId(), null, $thread->getId());

        $threadLastPost = $em->getRepository('GdrGameBundle:ForumPost')
            ->getLastPostOfThread($thread->getId());

        if ($newCategoryLastPost->getCreatedAt() < $threadLastPost->getCreatedAt()) {

            $newCategory->setLastPostAuthor($thread->getLastPostAuthor());
            $newCategory->setLastPostTime($thread->getLastPostTime());
            $newCategory->setLastThread($thread);
        }

        // Aggiorno anche la vecchia categoria.
        $oldCategoryLastPost = $em->getRepository('GdrGameBundle:ForumPost')
            ->getLastPostOfCategory($oldCategory->getId(), null, $thread->getId());

        if (null === $oldCategoryLastPost) {
            $oldCategory->setLastPostAuthor(null);
            $oldCategory->setLastPostTime(null);
            $oldCategory->setLastThread(null);
        } else {
            $oldCategory->setLastPostAuthor($oldCategoryLastPost->getAuthorName());
            $oldCategory->setLastPostTime($oldCategoryLastPost->getCreatedAt());
            $oldCategory->setLastThread($oldCategoryLastPost->getThread());
        }

        $em->persist($oldCategory);
        $em->persist($newCategory);
        $em->flush();
    }

    public function followAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $thread = $this->getDoctrine()->getRepository('GdrGameBundle:ForumThread')
            ->find($id);

        if (null === $thread) {
            throw new EntityNotFoundException();
        }

        $follow = $this->getDoctrine()->getRepository('GdrGameBundle:FollowThread')
            ->findBy(
                array(
                    'personage' => $this->getPersonage(),
                    'thread' => $thread
                )
            );

        if ($follow) {
            $this->get('gdr.forum')->unfollowThread($thread, $this->getPersonage());

            $request = $this->getRequest();
            return new RedirectResponse($request->headers->get('referer'));
        }

        $follow = new FollowThread();
        $follow->setPersonage($this->getPersonage());
        $follow->setThread($thread);

        $em->persist($follow);
        $em->flush();

        $request = $this->getRequest();
        return new RedirectResponse($request->headers->get('referer'));
    }

    public function closeThreadAction(Request $request, $id)
    {
        $thread = $this->getDoctrine()->getRepository('GdrGameBundle:ForumThread')
            ->find($id);

        if (!$thread){
            throw new NotFoundHttpException();
        }

        if ($this->getPermission()->isModForum(null, $thread, $this->getPersonage()) || $this->getPermission()->isModForum()){
            $thread->setIsLocked(true);
        }

        $em = $this->getDoctrine()->getManager();
        $em->persist($thread);
        $em->flush();

        return $this->redirect($this->generateUrl('bacheca-show-thread', ['id' => $thread->getId()]));
    }

    /**
     * @param Forum $forum
     *
     * @return bool
     * @throws \Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException
     */
    protected function canSoulWrite(Forum $forum)
    {
        if ($this->getPersonage()->getIsSoul()) {
            return $forum->getAllowSoul();
        } else {
            return true;
        }
    }
}