<?php

namespace App\Repository;

use App\Entity\GeographicalEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method GeographicalEntity|null find($id, $lockMode = null, $lockVersion = null)
 * @method GeographicalEntity|null findOneBy(array $criteria, array $orderBy = null)
 * @method GeographicalEntity[]    findAll()
 * @method GeographicalEntity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GeographicalEntityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GeographicalEntity::class);
    }

    // /**
    //  * @return GeographicalEntity[] Returns an array of GeographicalEntity objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GeographicalEntity
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
