<?php
/**
 * Tanguy GITON Copyright (c) 2016.
 */

namespace AppBundle\Repository;

use Doctrine\ORM\NoResultException;

/**
 * NewsletterRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class NewsletterRepository extends \Doctrine\ORM\EntityRepository
{
    public function findJoin($id)
    {
        $query = $this->createQueryBuilder('n')
            ->where('n.id = :id')
            ->join('n.rubriques', 'r')
            ->addOrderBy('r.position', 'ASC')
            ->join('r.posts', 'p')
            ->addOrderBy('p.position', 'ASC')
            ->join('p.type', 't')
            ->setParameter('id', $id)
            ->getQuery();

        try {
            return $query->getSingleResult();
        } catch (NoResultException $e) {
            return null;
        }
    }
}
