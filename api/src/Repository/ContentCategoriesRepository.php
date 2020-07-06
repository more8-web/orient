<?php

namespace App\Repository;

use App\Entity\ContentCategories;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ContentCategories|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContentCategories|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContentCategories[]    findAll()
 * @method ContentCategories[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContentCategoriesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ContentCategories::class);
    }

    // /**
    //  * @return ContentCategories[] Returns an array of ContentCategories objects
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
    public function findOneBySomeField($value): ?ContentCategories
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
