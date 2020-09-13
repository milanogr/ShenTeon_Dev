<?php

namespace Gdr\AvatarBundle\Controller;

use Gdr\UserBundle\Controller\Controller;
use Doctrine\ORM\EntityNotFoundException;
use Gdr\UserBundle\Entity\Personage;
use Symfony\Component\HttpFoundation\File\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * Visualizza le informazioni del personaggio (prima scheda)
     *
     * @param null $name
     *
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws EntityNotFoundException
     */
    public function indexAction($name = null)
    {
        if (null === $name) {
            $is_owner = true;
            $personage = $this->getPersonage();
        } else {
            $personage = $this->checkIfValidName($name);
            $is_owner = $personage == $this->getPersonage() ? true : false;
        }

        if (null === $personage) {
            throw new EntityNotFoundException('Personaggio non trovato con questo nome.');
        }

        $hasKey = false;

        if ($personage->getAddress()) {
            // Ho la chiave?
            $hasKey = $this->getDoctrine()->getRepository('GdrItemsBundle:Inventory')
                ->getKeysForLocationAndPersonage($personage->getAddress()->getId(), $personage->getId());

            $hasKey = !$hasKey ? false : true;
        }

        // Recupero le lingue parlate.
        $languages = $this->getDoctrine()->getRepository('GdrUserBundle:Language')
            ->getLanguagesByPersonage($this->getPersonage()->getId());
        $langs = array();
        foreach ($languages as $lang) {
            $langs[] = $lang->getRace()->getName();
        }

        // Se è ajax visualizzo solo il partial.
        if ($this->getRequest()->isXmlHttpRequest()) {
            $response = $this->render(
                'GdrAvatarBundle:Default:avatar.html.twig',
                array(
                    'personage' => $personage,
                    'is_owner' => $is_owner,
                    'hasKey' => $hasKey,
                    'languages' => $langs
                )
            );

            // Imposto una cache di 5 secondi per evitare continue richieste switchando le tab.
            $response->setMaxAge(5);

            return $response;
        }

        return $this->render(
            'GdrAvatarBundle:Default:index.html.twig',
            array(
                'personage' => $personage,
                'is_owner' => $is_owner,
                'hasKey' => $hasKey,
                'languages' => $langs
            )
        );
    }

    public function miniAvatarAction()
    {
        $pg = $this->getDoctrine()->getRepository('GdrUserBundle:Personage')
            ->createQueryBuilder('p')
            ->select('p.name as name, s.value as surname, r.name as race, p.age as age, p.combatLevel as combatLevel')
            ->addSelect('p.raceLevel as raceLevel')
            ->innerJoin('p.surname', 's')
            ->innerJoin('p.race', 'r')
            ->andWhere('p.id = :id')
            ->setParameter('id', $this->getPersonage()->getId())
            ->getQuery()
            ->useQueryCache(true)
            ->useResultCache(true, 360)
            ->getOneOrNullResult();

        $return = "
                <ul>
                    <li><span>Nome:</span> " . $pg['name'] . " </li>
                    <li><span>Cognome:</span> " . $pg['surname'] . "</li>
                    <li><span>Razza:</span> ".$pg['race']."</li>
                    <li><span>Età:</span> ".$pg['age']."</li>
                    <li><span>Lvl. Combattente:</span> ".$pg['combatLevel']."</li>
                    <li><span>Lvl. Razziale:</span> ".$pg['raceLevel']."</li>
                </ul>
        ";

        return new Response($return);
    }

    /**
     * @param $name
     *
     * @return \Gdr\UserBundle\Entity\Personage
     * @throws EntityNotFoundException
     */
    protected function checkIfValidName($name)
    {
        $personage = $this->getDoctrine()
            ->getRepository('GdrUserBundle:Personage')
            ->findOneBy(array('name' => $name));

        if (null === $personage) {
            throw new EntityNotFoundException();
        }

        return $personage;
    }
}
