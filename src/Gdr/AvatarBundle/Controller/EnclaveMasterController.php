<?php

namespace Gdr\AvatarBundle\Controller;

use Doctrine\ORM\EntityNotFoundException;
use Gdr\AvatarBundle\Entity\Experience;
use Gdr\AvatarBundle\Form\Type\ChangeClanRankType;
use Gdr\AvatarBundle\Form\Type\ChangeEnclaveRankType;
use Gdr\AvatarBundle\Form\Type\NewEnclaveMemberType;
use Gdr\AvatarBundle\Form\Type\NewClanMemberType;
use Gdr\AvatarBundle\Form\Type\NewForumCategoryType;
use Gdr\GameBundle\Entity\ForumCategory;
use Gdr\UserBundle\Controller\Controller;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class EnclaveMasterController extends Controller
{
    /**
     * @return bool
     */
    protected function checkPermissionEnclave()
    {
        return $this->getPersonage()->canManageEnclave();
    }

    /**
     * @return bool
     */
    protected function checkPermissionClan()
    {
        return $this->getPersonage()->canManageClan();
    }

    public function indexEnclaveAction()
    {
        if (!$this->checkPermissionEnclave()) {
            throw new AccessDeniedHttpException();
        }

        $enclave = $this->getPersonage()->getEnclaveRank()->getEnclave();
        $members = $this->getDoctrine()->getRepository("GdrGameBundle:Enclave")->findSortedEnclaveMembers(
            $enclave->getId()
        );

        $form = $this->createForm(new NewEnclaveMemberType($enclave));
        $request = $this->getRequest();

        $form->handleRequest($request);

        // Nuovo ingresso
        if ($form->isValid()) {

            $personage = $this->getDoctrine()->getRepository("GdrUserBundle:Personage")
                ->findOneBy(
                    array(
                        "name" => $form->get("name")->getData(),
                    )
                );

            $em = $this->getDoctrine()->getManager();
            $rank = $form->get("rank")->getData();
            $personage->setEnclaveRank($rank);

            $exp = new Experience();
            $exp->setPersonage($personage);
            $exp->setBody(
                strtoupper($personage->getName()) . " da oggi fa parte dell’Enclave " . strtoupper(
                    $rank->getEnclave()->getName()
                ) . " ricoprendo il ruolo di " . strtoupper($rank->getName()) . "."
            );
            $exp->setIsInvisible(true);

            // Se è enclave combattente lo imposto guerriero.
            if ($enclave->getCategory()->getIsCombat()){
                $personage->setIsExWarrior(true);
            }

            $em->persist($personage);
            $em->persist($exp);
            $em->flush();

            return $this->redirect($this->generateUrl("master-enclave-index"));
        }

        return $this->render(
            "GdrAvatarBundle:Enclave:indexEnclave.html.twig",
            array(
                "enclave" => $enclave,
                "members" => $members,
                "form" => $form->createView(),
                "canEditLvl" => $enclave->getCategory()->getIsCombat()
            )
        );
    }

    public function editMemberEnclaveAction($id)
    {
        if (!$this->checkPermissionEnclave()) {
            throw new AccessDeniedHttpException();
        }

        $enclave = $this->getPersonage()->getEnclaveRank()->getEnclave();
        $member = $this->getDoctrine()->getRepository("GdrGameBundle:Enclave")->findPersonageInEnclave($id, $enclave);

        if (is_null($member)) {
            throw new EntityNotFoundException();
        }

        $form = $this->createForm(new ChangeEnclaveRankType(), $member);
        $request = $this->getRequest();

        $form->handleRequest($request);

        $oldRank = $member->getEnclaveRank();

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $newRank = $form->get('enclaveRank')->getData();


            $member->setEnclaveRank($form->get('enclaveRank')->getData());

            $exp = new Experience();
            $exp->setPersonage($member);
            $exp->setBody(
                $member->getName() . " passa al ruolo " . strtoupper($form->get('enclaveRank')->getData()->getName()) . "
                 dell'Enclave " . strtoupper($enclave->getName()) . "."
            );
            $exp->setIsInvisible(true);

            $em->persist($member);
            $em->persist($exp);
            $em->flush();


            return $this->redirect($this->generateUrl("master-enclave-index"));
        }


        return $this->render(
            "GdrAvatarBundle:Enclave:editMemberEnclave.html.twig",
            array(
                "enclave" => $enclave,
                "member" => $member,
                "form" => $form->createView()
            )
        );
    }

    public function editMemberLevelEnclaveAction($id)
    {
        if (!$this->checkPermissionEnclave()) {
            throw new AccessDeniedHttpException();
        }

        $enclave = $this->getPersonage()->getEnclaveRank()->getEnclave();
        $member = $this->getDoctrine()->getRepository("GdrGameBundle:Enclave")->findPersonageInEnclave($id, $enclave);

        if (is_null($member)) {
            throw new EntityNotFoundException();
        }

        if (false === $enclave->getCategory()->getIsCombat()) {
            throw new AccessDeniedHttpException();
        }

        $form = $this->createFormBuilder($member)
            ->add('combatLevel')
            ->getForm();

        $request = $this->getRequest();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($member);
            $em->flush();

            return $this->redirect($this->generateUrl("master-enclave-index"));
        }


        return $this->render(
            "GdrAvatarBundle:Enclave:editMemberLevelEnclave.html.twig",
            array(
                "enclave" => $enclave,
                "member" => $member,
                "form" => $form->createView()
            )
        );
    }

    public function deleteMemberEnclaveAction($id)
    {
        if (!$this->checkPermissionEnclave()) {
            throw new AccessDeniedHttpException();
        }

        $enclave = $this->getPersonage()->getEnclaveRank()->getEnclave();
        $member = $this->getDoctrine()->getRepository("GdrGameBundle:Enclave")->findPersonageInEnclave($id, $enclave);

        if (is_null($member)) {
            throw new AccessDeniedHttpException();
        }

        // Motivo:
        $motivo = $this->getRequest()->get('reason');

        $em = $this->getDoctrine()->getManager();

        $member->setEnclaveRank(null);

        $exp = new Experience();
        $exp->setPersonage($member);
        $exp->setIsInvisible(true);

        if ($motivo == 1) {
            $exp->setBody(
                strtoupper($member->getName()) . " da oggi non fa più parte dell’Enclave " . strtoupper(
                    $enclave->getName()
                ) . " in quanto è Terminato il suo Incarico."
            );
        } else {
            $exp->setBody(
                strtoupper(
                    $member->getName()
                ) . " da oggi e per sua scelta non fa più parte dell’Enclave " . strtoupper(
                    $enclave->getName()
                ) . " in quanto Dimissionario."
            );
        }

        $em->persist($member);
        $em->persist($exp);
        $em->flush();

        return $this->redirect($this->generateUrl("master-enclave-index"));
    }

    public function manageForumEnclaveAction()
    {
        if (!$this->checkPermissionEnclave()) {
            throw new AccessDeniedHttpException();
        }
        $enclave = $this->getPersonage()->getEnclaveRank()->getEnclave();

        $new_category = new ForumCategory();
        $form = $this->createForm(new NewForumCategoryType($enclave), $new_category);
        $request = $this->getRequest();

        if ($form->handleRequest($request)) {
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($new_category);
                $em->flush();

                return $this->redirect($this->generateUrl("master-forum-enclave-admin"));
            }

        }

        $forum_rep = $this->getDoctrine()->getRepository("GdrGameBundle:Forum");
        $category_rep = $this->getDoctrine()->getRepository("GdrGameBundle:ForumCategory");


        $forums = $forum_rep->findEnclaveForums($enclave);
        $categories = $category_rep->findEnclaveForumCategories($enclave);

        return $this->render(
            "GdrAvatarBundle:Enclave:forumAdminEnclave.html.twig",
            array(
                "enclave" => $enclave,
                "forums" => $forums,
                "categories" => $categories,
                "form" => $form->createView()
            )
        );
    }

    public function editForumEnclaveCategoryAction($id)
    {
        if (!$this->checkPermissionEnclave()) {
            throw new AccessDeniedHttpException();
        }

        $enclave = $this->getPersonage()->getEnclaveRank()->getEnclave();
        $category_rep = $this->getDoctrine()->getRepository("GdrGameBundle:ForumCategory");

        $category = $category_rep->findCategoryByIdAndEnclave($id, $enclave);
        if (is_null($category)) {
            throw new EntityNotFoundException();
        }
        $form = $this->createForm(new NewForumCategoryType($enclave), $category);
        $request = $this->getRequest();

        if ($form->handleRequest($request)) {
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($category);
                $em->flush();

                return $this->redirect($this->generateUrl("master-forum-enclave-admin"));
            }

        }

        return $this->render(
            "GdrAvatarBundle:Enclave:editForumEnclaveCategory.html.twig",
            array(
                "enclave" => $enclave,
                "category" => $category,
                "form" => $form->createView()
            )
        );

    }

    public function indexClanAction()
    {
        if (!$this->checkPermissionClan()) {
            throw new AccessDeniedHttpException();
        }

        $clan = $this->getPersonage()->getClanRank()->getEnclave();
        $members = $this->getDoctrine()->getRepository("GdrGameBundle:Enclave")->findSortedClanMembers($clan->getId());

        $form = $this->createForm(new NewClanMemberType($clan));
        $request = $this->getRequest();

        if ($form->handleRequest($request)) {
            if ($form->isValid()) {
                if (!$this->checkPermissionClan()) {
                    throw new AccessDeniedHttpException();
                }

                $clan = $this->getPersonage()->getClanRank()->getEnclave();

                $form = $this->createForm(new NewClanMemberType($clan));
                $request = $this->getRequest();

                if ($form->handleRequest($request)) {
                    if ($form->isValid()) {
                        $personage = $this->getDoctrine()->getRepository("GdrUserBundle:Personage")
                            ->findOneBy(
                                array(
                                    "name" => $form->getData()["name"],
                                    "clanRank" => null
                                )
                            );

                        if (is_null($personage)) {
                            throw new EntityNotFoundException();
                        } else {
                            $em = $this->getDoctrine()->getManager();
                            $personage->setClanRank($form->getData()["rank"]);

                            $exp = new Experience();
                            $exp->setPersonage($personage);
                            $exp->setBody(
                                strtoupper(
                                    $personage->getName()
                                ) . " da oggi fa parte dell’Enclave Razziale " . strtoupper(
                                    $form->getData()["rank"]->getEnclave()->getName()
                                ) . " ricoprendo il ruolo di " . strtoupper($form->getData()["rank"]->getName()) . "."
                            );
                            $exp->setIsInvisible(true);

                            $em->persist($personage);
                            $em->persist($exp);
                            $em->flush();

                            return $this->redirect($this->generateUrl("master-clan-index"));
                        }
                    }

                }
            }

        }

        return $this->render(
            "GdrAvatarBundle:Enclave:indexClan.html.twig",
            array(
                "clan" => $clan,
                "members" => $members,
                "form" => $form->createView()
            )
        );
    }

    public function editMemberClanAction($id)
    {
        if (!$this->checkPermissionClan()) {
            throw new AccessDeniedHttpException();
        }

        $clan = $this->getPersonage()->getClanRank()->getEnclave();
        $member = $this->getDoctrine()->getRepository("GdrGameBundle:Enclave")->findPersonageInClan($id, $clan);

        if (is_null($member)) {
            throw new EntityNotFoundException();
        }

        $form = $this->createForm(new ChangeClanRankType(), $member);
        $request = $this->getRequest();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

                $exp = new Experience();
                $exp->setPersonage($member);
                $exp->setBody(
                    $member->getName() . " passa al ruolo " . strtoupper($form->get('clanRank')->getData()->getName()) . "
                 dell'Enclave Razziale " . strtoupper($form->get('clanRank')->getData()->getEnclave()->getName()) . "."
                );
                $exp->setIsInvisible(true);

                $em->persist($member);
                $em->persist($exp);
                $em->flush();

            return $this->redirect($this->generateUrl("master-clan-index"));
        }

        return $this->render(
            "GdrAvatarBundle:Enclave:editMemberClan.html.twig",
            array(
                "clan" => $clan,
                "member" => $member,
                "form" => $form->createView()
            )
        );

    }

    public function deleteMemberClanAction($id)
    {
        if (!$this->checkPermissionClan()) {
            throw new AccessDeniedHttpException();
        }

        $clan = $this->getPersonage()->getClanRank()->getEnclave();
        $member = $this->getDoctrine()->getRepository("GdrGameBundle:Enclave")->findPersonageInClan($id, $clan);

        if (is_null($member)) {
            throw new AccessDeniedHttpException();
        }

        // Motivo:
        $motivo = $this->getRequest()->get('reason');

        $em = $this->getDoctrine()->getManager();

        $member->setClanRank(null);

        $exp = new Experience();
        $exp->setPersonage($member);
        $exp->setIsInvisible(true);

        if ($motivo == 1) {
            $exp->setBody(
                strtoupper($member->getName()) . " da oggi non fa più parte dell’Enclave Razziale" . strtoupper(
                    $clan->getName()
                ) . " in quanto è Terminato il suo Incarico."
            );
        } else {
            $exp->setBody(
                strtoupper(
                    $member->getName()
                ) . " da oggi e per sua scelta non fa più parte dell’Enclave Razziale " . strtoupper(
                    $clan->getName()
                ) . " in quanto Dimissionario."
            );
        }

        $em->persist($member);
        $em->persist($exp);
        $em->flush();

        return $this->redirect($this->generateUrl("master-clan-index"));

    }

    public function manageForumClanAction()
    {
        if (!$this->checkPermissionClan()) {
            throw new AccessDeniedHttpException();
        }
        $clan = $this->getPersonage()->getClanRank()->getEnclave();

        $new_category = new ForumCategory();
        $form = $this->createForm(new NewForumCategoryType($clan), $new_category);
        $request = $this->getRequest();

        if ($form->handleRequest($request)) {
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();

                $em->persist($new_category);
                $em->flush();

                return $this->redirect($this->generateUrl("master-forum-clan-admin"));
            }

        }

        $forum_rep = $this->getDoctrine()->getRepository("GdrGameBundle:Forum");
        $category_rep = $this->getDoctrine()->getRepository("GdrGameBundle:ForumCategory");

        $forums = $forum_rep->findEnclaveForums($clan);
        $categories = $category_rep->findEnclaveForumCategories($clan);


        return $this->render(
            "GdrAvatarBundle:Enclave:forumAdminClan.html.twig",
            array(
                "clan" => $clan,
                "forums" => $forums,
                "categories" => $categories,
                "form" => $form->createView()
            )
        );
    }

    public function editForumClanCategoryAction($id)
    {
        if (!$this->checkPermissionClan()) {
            throw new AccessDeniedHttpException();
        }

        $clan = $this->getPersonage()->getClanRank()->getEnclave();
        $category_rep = $this->getDoctrine()->getRepository("GdrGameBundle:ForumCategory");

        $category = $category_rep->findCategoryByIdAndClan($id, $clan);
        if (is_null($category)) {
            throw new Exception("BBB");
        }
        $form = $this->createForm(new NewForumCategoryType($clan), $category);
        $request = $this->getRequest();

        if ($form->handleRequest($request)) {
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($category);
                $em->flush();

                return $this->redirect($this->generateUrl("master-forum-clan-admin"));
            }

        }

        return $this->render(
            "GdrAvatarBundle:Enclave:editForumClanCategory.html.twig",
            array(
                "clan" => $clan,
                "category" => $category,
                "form" => $form->createView()
            )
        );

    }
}
