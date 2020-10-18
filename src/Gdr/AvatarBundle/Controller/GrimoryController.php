<?php

namespace Gdr\AvatarBundle\Controller;

use Doctrine\ORM\EntityNotFoundException;
use Gdr\UserBundle\Controller\Controller;
use Gdr\UserBundle\Entity\Grimory;
use Gdr\UserBundle\Entity\Spell;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class GrimoryController extends Controller
{

    public function indexAction()
    {
        $personage = $this->getPersonage();

        // Recupera gli oggetti con "grimoryLevel".
        // DA RICORDARE: BISOGNA DARE SEMPRE GLI OGGETTI IN ORDINE DI LIVELLO, NON POSSONO ESSERE CEDIBILI E DISTRUTTIBILI
        $books = $this->getDoctrine()->getRepository('GdrItemsBundle:Inventory')
            ->findItemsWithGrimory($personage->getId());

        $spellsStudied = $this->getDoctrine()->getRepository('GdrUserBundle:Grimory')
            ->findSpellsLearned($personage->getId());

        $spellsSelected = $this->getDoctrine()->getRepository('GdrUserBundle:Grimory')
            ->findSpellsSelected($personage->getId());

        $canStudy = $this->getDoctrine()->getRepository('GdrUserBundle:Personage')
            ->canStudy($personage->getId());

        $session = $this->get('session');

        if ($session->get('check-spell-reset', new \DateTime()) <= new \DateTime()){
            $this->removeNotLearnable();
            $time = new \DateTime();
            $session->set('check-spell-reset', $time->modify("+ 20 minutes"));
        }

        return $this->render(
            'GdrAvatarBundle:Grimory:index.html.twig',
            array(
                'books' => $books,
                'spellsStudied' => $spellsStudied,
                'spellsSelected' => $spellsSelected,
                'maxMana' => $this->getMaxMana(),
                'canStudy' => $canStudy,
                'canStudyAt' => $personage->getCanStudyGrimoryAt()
            )
        );
    }

    public function categorySpellsAction($level)
    {
        $categories = $this->getDoctrine()->getRepository('GdrUserBundle:Spell')
            ->findCategoriesByLevel($level, $this->getPersonage()->getId());

        return $this->render(
            'GdrAvatarBundle:Grimory:categories.html.twig',
            array(
                'categories' => $categories,
                'level' => $level
            )
        );
    }

    public function spellsAction($categoryId, $level)
    {
        $spells = $this->getDoctrine()->getRepository('GdrUserBundle:Spell')
            ->getQueryForSpellsByCategoryAndLevel($categoryId, $level, $this->getPersonage()->getId());

        $count = count($spells->getResult());
        $spells = $spells->setHint('knp_paginator.count', $count);

        $paginator = $this->get('knp_paginator')->paginate(
            $spells,
            $this->getRequest()->query->get('page', 1),
            15,
            array('distinct' => false)
        );

        $canStudy = $this->canStudy();

        return $this->render(
            'GdrAvatarBundle:Grimory:spells.html.twig',
//            'GdrGameBundle:Default:profiler.html.twig',
            array(
                'paginator' => $paginator,
                'canStudy' => $canStudy
            )
        );
    }

    public function selectSpellAction($spellId)
    {
        $em = $this->getDoctrine()->getManager();

        // Esiste l'incantesimo?
        $spell = $this->getDoctrine()->getRepository('GdrUserBundle:Spell')
            ->findOneBy(array('id' => $spellId));

        if (null === $spell) {
            throw new EntityNotFoundException();
        }

        // Possiedo un oggetto per visualizzare questo livello di incanti?
        $this->canViewLevel($spell->getLevel());

        // Posso studiare?
        if (false === $this->canStudy()) {
            return new JsonResponse(array(
                'response' => false,
                'value' => false,
                'message' => 'Non potete studiare ancora.'
            ));
        }

        $grimory = $this->getDoctrine()->getRepository('GdrUserBundle:Grimory')
            ->findOneBy(array('spell' => $spell, 'personage' => $this->getPersonage()));

        if (null !== $grimory && $grimory->getIsSelected()) {

            // Se non è nemmeno studiata elimino il record, altrimenti lo aggiorno.
            if (false === $grimory->getIsLearned()) {
                $em->remove($grimory);
            } else {
                $grimory->setIsSelected(false);
                $em->persist($grimory);
            }
            $em->flush();

            return new JsonResponse(array(
                'response' => true,
                'value' => false,
                'message' => 'Avete deselezionato correttamente l\'incantesimo. Ricordatevi che per rendere effettiva la
                modifica dovrete STUDIARE, se l\'incantesimo era già stato imparato.'
            ));
        }

        // Quanto mana mi costerà questo oggetto?
        $spellManaCost = $spell->getLevel();

        // Recupero il mio mana totale disponibile.
        $maxMana = $this->getMaxMana();

        // Recupero il mio mana utilizzato, che è dato dalla somma dei livelli di tutti gli oggetti grimorio.
        $usedMana = $this->getSelectedMana();

        // Supero il mana totale?
        if ($usedMana + $spellManaCost > $maxMana) {
            $rimanente = $maxMana - $usedMana;

            return new JsonResponse(array(
                'response' => false,
                'value' => false,
                'message' => "Non avete abbastanza mana per poter studiare questo incantesimo.
                Costo incanto: <strong>{$spellManaCost}</strong>, Mana disponibile: <strong>{$rimanente}</strong>."
            ));
        }

        // Se non esiste lo inserisco.
        if (null === $grimory) {
            $grimory = new Grimory();
            $grimory->setPersonage($this->getPersonage());
            $grimory->setSpell($spell);
        }
        $grimory->setIsSelected(true);

        $em->persist($grimory);
        $em->flush();

        return new JsonResponse(array(
            'response' => true,
            'value' => true,
            'message' => 'Avete selezionato correttamente l\'incantesimo da imparare, ma dovrete STUDIARE per poterlo usare.'
        ));
    }

    public function studySpellsAction()
    {
        $personage = $this->getPersonage();
        $repo = $this->getDoctrine()->getRepository('GdrUserBundle:Grimory');
        $em = $this->getDoctrine()->getManager();

        if (false === $this->canStudy()) {
            return new JsonResponse(array(
                'response' => false,
                'message' => "Non potete studiare fino al sorgere del sole"
            ));
        }

        // Tolgo il "learned" da quelli imparati precedentemente (i vecchi saranno preservati dal select).
        $learnedSpells = $repo->findSpellsLearned($personage->getId(), true);

        foreach ($learnedSpells as $spell) {
            $spell->setIsLearned(false);
            $spell->setIsUsed(false);
            $em->persist($spell);
        }
        $em->flush();

        // I selected diventano learned.
        $selectedSpells = $repo
            ->findSpellsSelected($personage->getId(), true);

        foreach ($selectedSpells as $s) {
            if ($this->canLearnSpell($s)){
                $s->setIsLearned(true);
                $s->setIsUsed(false);
                $em->persist($s);
            }
        }
        $em->flush();

        // Elimino quelli senza learned e selected
        $lostChild = $repo->findBy(
            array(
                'personage' => $this->getPersonage(),
                'isLearned' => false,
                'isSelected' => false
            )
        );

        foreach ($lostChild as $l) {
            $em->remove($l);
        }
        $em->flush();

        // Posso studiare dalle 5 di domani.
        $now = new \DateTime();
        $now = $now->format('H');

        if ($now >= '00' && $now < '05') {
            $personage->setCanStudyGrimoryAt(new \DateTime('today 5am'));
        } else {
            $personage->setCanStudyGrimoryAt(new \DateTime('tomorrow 5am'));
        }

        $em->persist($personage);
        $em->flush();

        return new JsonResponse(array(
            'response' => true
        ));
    }

    /**
     * Visualizza il numero di incantesimi SELEZIONATI per livello.
     *
     * @param $level
     *
     * @return Response
     */
    public function totalSpellsLearnedAction($level)
    {
        $total = $this->getDoctrine()->getRepository('GdrUserBundle:Grimory')
            ->getTotalSpellsSelectedByLevel($level, $this->getPersonage()->getId());

        return new Response($total);
    }

    public function showSpellAction($id)
    {
        $spell = $this->getDoctrine()->getRepository('GdrUserBundle:Spell')
            ->findOneBy(array('id' => $id));

        if (null === $spell) {
            throw new EntityNotFoundException();
        }

        return new Response("<p>{$spell->getDescription()}</p>");
    }

    protected function canViewLevel($level)
    {
        $can = $this->getDoctrine()->getRepository('GdrItemsBundle:Inventory')
            ->canViewGrimory($this->getPersonage()->getId(), $level);

        if (false === $can) {
            throw new AccessDeniedHttpException();
        }
    }

    /**
     * Indica quanto mana posso usare (limite max).
     *
     * @return int
     */
    protected function getMaxMana()
    {
        return $this->getDoctrine()->getRepository('GdrItemsBundle:Inventory')
            ->getMaxMana($this->getPersonage()->getId());
    }

    /**
     * Indica il mana fino ad ora utilizzato.
     *
     * @return int
     */
    protected function getLearnedMana()
    {
        return $this->getDoctrine()->getRepository('GdrUserBundle:Grimory')
            ->getLearnedMana($this->getPersonage()->getId());
    }

    protected function getSelectedMana()
    {
        return $this->getDoctrine()->getRepository('GdrUserBundle:Grimory')
            ->getSelectedMana($this->getPersonage()->getId());
    }

    protected function canStudy()
    {
        $personage = $this->getPersonage();

        return $this->getDoctrine()->getRepository('GdrUserBundle:Personage')
            ->canStudy($personage->getId());
    }

    protected function canLearnSpell(Grimory $grimory)
    {
        $spell = $grimory->getSpell();
        $can = $this->getDoctrine()->getRepository('GdrItemsBundle:Inventory')
            ->canViewGrimory($this->getPersonage()->getId(), $spell->getLevel());

        $em = $this->getDoctrine()->getManager();

        if (false === $can){
            $grimory = $em->getRepository('GdrUserBundle:Grimory')
                ->findOneBy(array(
                        'personage' => $this->getPersonage(),
                        'spell' => $spell
                    ));

            if ($grimory){
                $em->remove($grimory);
                $em->flush();

                return false;
            }
        }

        return true;
    }

    //TODO: CRON!
    protected function removeNotLearnable(){
        $repo = $this->getDoctrine()->getRepository('GdrUserBundle:Grimory');
        $em = $this->getDoctrine()->getManager();
        $personage = $this->getPersonage();

        $learnedSpells = $repo->findSpellsLearned($personage->getId(), true);

        foreach ($learnedSpells as $spell) {
            $this->canLearnSpell($spell);
        }
        $em->flush();

        // I selected diventano learned.
        $selectedSpells = $repo
            ->findSpellsSelected($personage->getId(), true);

        foreach ($selectedSpells as $s) {
            $this->canLearnSpell($s);
        }
    }
}