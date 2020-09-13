<?php

namespace Gdr\GameBundle\Controller;

use Gdr\GameBundle\Entity\Transaction;
use Gdr\GameBundle\Entity\TransactionType;
use Gdr\UserBundle\Controller\Controller;
use Gdr\GameBundle\Entity\Work;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Class OnlineController
 *
 * @package Gdr\GameBundle\Controller
 */
class WorkController extends Controller
{

    public function indexAction()
    {
        $pg = $this->getPersonage();

        if (is_null($pg->getLastWork())) {
            $already = false;
        } else {
            $last_work = $pg->getLastWork();
            $today = new \DateTime();
            $already = $last_work->format("z") == $today->format("z");
        }

        $free_works = $this->getDoctrine()->getRepository("GdrGameBundle:Work")->findAvailableWorks();

        if (!count($free_works)) {
            $em = $this->getDoctrine()->getManager();
            $works = $this->getDoctrine()->getRepository("GdrGameBundle:Work")->findWorks();

            foreach ($works as $n_work):
                $n_work->resetSlots();
                $em->persist($n_work);
            endforeach;
            $em->flush();
        }

        $works = $this->getDoctrine()->getRepository("GdrGameBundle:Work")->findWorks();

        return $this->render(
            'GdrGameBundle:Work:index.html.twig',
            array(
                "works" => $works,
                "already" => $already
            )
        );
    }

    public function workAction($id)
    {
        $work = $this->getDoctrine()->getRepository("GdrGameBundle:Work")->find($id);
        $em = $this->getDoctrine()->getManager();

        if (!$work) {
            $this->redirectWithError("<strong>Attenzione:</strong> il lavoro scelto non esiste più.");
        }

        $pg = $this->getPersonage();

        $already = false;

        if (null !== $pg->getLastWork()) {
            $today = new \DateTime();
            $already = $pg->getLastWork()->format("z") == $today->format("z");
        }

        if ($already) {
            $logger = $this->get('logger');
            $logger->error("Probabile tentativo di lavorare di più di pg " . $pg->getId());
            return $this->redirectWithError("<strong>Attenzione:</strong> hai già lavorato per oggi.");
        }

        $pay = $work->getPay();
        $work->fillSlot();
        if (!$work->getIsFree()) {
            $free_works = $this->getDoctrine()->getRepository("GdrGameBundle:Work")->findAvailableWorks();

            if (!count($free_works)) {
                $logger = $this->get('logger');
                $logger->error("Lavoro scelto terminato per " . $pg->getId());
                return $this->redirectWithError(
                    "<strong>Attenzione:</strong> il lavoro che hai scelto è terminato prima che tu potessi lavorare."
                );
            }
        } else {
            $em->persist($work);
        }
        $pg->setBankAmount($pg->getBankAmount() + $pay);
        $pg->setLastWork(new \DateTime());

        $transType = $this->getDoctrine()->getRepository('GdrGameBundle:TransactionType')
            ->findOneBy(
                array('id' => TransactionType::CREDIT)
            );
        $trans = new Transaction();
        $trans->setType($transType);
        $trans->setSubject($pg);
        $trans->setIsPlus(true);
        $trans->setAmount($pay);
        $trans->setNote("Avete lavorato come {$work->getName()} al Palazzo del Lavoro.");

        $em->persist($pg);
        $em->persist($trans);
        $em->flush();

        $this->get('session')->getFlashBag()->add('error', "Hai lavorato come {$work->getName()}.");
        return $this->redirect($this->generateUrl("lavoro-index"));
    }

    protected function redirectWithError($error)
    {
        $this->get('session')->getFlashBag()->add('error', $error);

        return $this->redirect($this->generateUrl("lavoro-index"));
    }
}