<?php

namespace App\Repository;

use App\Entity\ContentToKeyword;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ContentToKeyword|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContentToKeyword|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContentToKeyword[]    findAll()
 * @method ContentToKeyword[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContentToKeywordRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ContentToKeyword::class);
    }

    // /**
    //  * @return ContentToKeyword[] Returns an array of ContentToKeyword objects
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
    public function findOneBySomeField($value): ?ContentToKeyword
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
