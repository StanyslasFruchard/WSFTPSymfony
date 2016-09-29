<?php 

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class SubjectRepository extends EntityRepository
{
    public function findNotResolved()
    {
        return $this->createQueryBuilder('subject')
            ->where('subject.resolved = false')
            ->orderBy('subject.updatedAt', 'ASC')
            ->getQuery()
            ->getResult();
    }
    public function findResolved()
    {
        return $this->createQueryBuilder('subject')
            ->setParameter("dateSixMonths", new \DateTime('-6 months'))
            ->where('subject.resolved = true')
            ->andWhere('subject.updatedAt > :dateSixMonths')
            ->orderBy('subject.votes', 'DESC')
            ->getQuery()
            ->getResult();
    }
}