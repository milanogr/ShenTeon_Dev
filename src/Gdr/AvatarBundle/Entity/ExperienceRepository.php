<?php

namespace Gdr\AvatarBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * ExperienceRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ExperienceRepository extends EntityRepository
{
    public function getQueryExperiencesByPersonage($personage_id, $can_view_invisibles = false)
    {
        $query = $this->createQueryBuilder('ex')
            ->andWhere('ex.personage = :personage')
            ->setParameter('personage', $personage_id);

        // Posso visualizzare gli invisibili solo se...
        if (false === $can_view_invisibles) {
            $query->andWhere('ex.isInvisible = :isHidden')
                ->setParameter('isHidden', false);
        }

        return $query->orderBy('ex.createdAt', 'DESC')->getQuery();
    }
}
