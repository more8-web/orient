<?php


namespace App\Repository;


use App\Entity\News;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method News|null find($id, $lockMode = null, $lockVersion = null)
 * @method News|null findOneBy(array $criteria, array $orderBy = null)
 * @method News[]    findAll()
 * @method News[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NewsRepository extends ServiceEntityRepository
{

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, News::class);
    }

    /**
     * @param $newsId
     * @return News|null Returns a User object
     */
    public function findByNewsId($newsId)
    {
        return $this->findOneBy(["news_id" => $newsId]);
    }

    /**
     * @param $newsId
     * @return bool
     */
    public function isNewsExists($newsId)
    {
        $news = $this->findOneBy($newsId);
        return !is_null($news);
    }

    /**
     * @param $alias
     * @param $status
     * @return News
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function createNews($alias, $status): News
    {
        $news = new News();
        $news->setNewsAlias($alias);
        $news->setNewsStatus($status);

        $em = $this->getEntityManager();
        $em->persist($alias);
        $em->flush();

        return $news;
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function flush()
    {
        $this->getEntityManager()->flush();
    }

    /*
    public function findOneBySomeField($value): ?User
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}