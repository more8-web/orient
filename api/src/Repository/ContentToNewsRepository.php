<?php

namespace App\Repository;

use App\Entity\ContentToNews;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ContentToNews|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContentToNews|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContentToNews[]    findAll()
 * @method ContentToNews[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContentToNewsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ContentToNews::class);
    }

    // /**
    //  * @return ContentToNews[] Returns an array of ContentToNews objects
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
    public function findOneBySomeField($value): ?ContentToNews
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
