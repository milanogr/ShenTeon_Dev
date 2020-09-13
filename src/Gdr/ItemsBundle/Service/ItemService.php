<?php

namespace Gdr\ItemsBundle\Service;

use Gdr\ItemsBundle\Entity\Inventory;
use JMS\DiExtraBundle\Annotation as DI;

/**
 * Class Generator
 *
 * @DI\Service("gdr.item.service", public=true)
 */
class ItemService
{
    /**
     * \Doctrine\Bundle\DoctrineBundle\Registry
     */
    private $doctrine;

    /**
     * @DI\InjectParams({
     *     "em" = @DI\Inject("doctrine")
     * })
     */
    public function __construct($doctrine)
    {
        $this->doctrine = $doctrine;
    }

    /**
     * @return \Doctrine\Bundle\DoctrineBundle\Registry
     */
    protected function getDoctrine()
    {
        return $this->doctrine;
    }

    public function removeBook(Inventory $inventory)
    {
        $em = $this->getDoctrine()->getManager();
        $personage = $inventory->getPersonage();
        $level = $inventory->getItem()->getGrimoryLevel();
        $spells = $this->getDoctrine()->getRepository("GdrUserBundle:Grimory")->findToDeleteSpellsByPersonageAndLevel($personage, $level);

        foreach ($spells as $spell):
            $em->remove($spell);
        endforeach;
        $em->flush();
        return true;
    }

}