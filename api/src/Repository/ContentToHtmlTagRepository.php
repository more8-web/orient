<?php

namespace App\Repository;

use App\Entity\ContentToHtmlTag;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ContentToHtmlTag|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContentToHtmlTag|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContentToHtmlTag[]    findAll()
 * @method ContentToHtmlTag[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContentToHtmlTagRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ContentToHtmlTag::class);
    }

    // /**
    //  * @return ContentToHtmlTag[] Returns an array of ContentToHtmlTag objects
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
    public function findOneBySomeField($value): ?ContentToHtmlTag
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
