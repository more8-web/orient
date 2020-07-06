<?php

namespace App\Repository;

use App\Entity\Contents;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Contents|null find($id, $lockMode = null, $lockVersion = null)
 * @method Contents|null findOneBy(array $criteria, array $orderBy = null)
 * @method Contents[]    findAll()
 * @method Contents[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContentsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Contents::class);
    }

    // /**
    //  * @return Contents[] Returns an array of Contents objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Contents
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
