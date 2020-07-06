<?php

namespace App\Repository;

use App\Entity\NewsCategories;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method NewsCategories|null find($id, $lockMode = null, $lockVersion = null)
 * @method NewsCategories|null findOneBy(array $criteria, array $orderBy = null)
 * @method NewsCategories[]    findAll()
 * @method NewsCategories[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NewsCategoriesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NewsCategories::class);
    }

    // /**
    //  * @return NewsCategories[] Returns an array of NewsCategories objects
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
    public function findOneBySomeField($value): ?NewsCategories
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
