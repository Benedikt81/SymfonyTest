<?php

namespace App\Repository;

use App\Entity\NamedEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method NamedEntity|null find($id, $lockMode = null, $lockVersion = null)
 * @method NamedEntity|null findOneBy(array $criteria, array $orderBy = null)
 * @method NamedEntity[]    findAll()
 * @method NamedEntity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NamedEntityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NamedEntity::class);
    }

    // /**
    //  * @return NamedEntity[] Returns an array of NamedEntity objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?NamedEntity
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
