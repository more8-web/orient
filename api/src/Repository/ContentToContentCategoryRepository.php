<?php

namespace App\Repository;

use App\Entity\ContentToContentCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ContentToContentCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContentToContentCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContentToContentCategory[]    findAll()
 * @method ContentToContentCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContentToContentCategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ContentToContentCategory::class);
    }

    // /**
    //  * @return ContentToContentCategory[] Returns an array of ContentToContentCategory objects
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
    public function findOneBySomeField($value): ?ContentToContentCategory
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
