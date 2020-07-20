<?php

namespace App\Repository;

use App\Entity\News;
use App\Entity\NewsCategory;
use App\Exceptions\Common\DatabaseException;
use App\Exceptions\News\NewsAlreadyBoundToNewsCategoryException;
use App\Exceptions\News\NewsNotFoundException;
use App\Exceptions\NewsCategory\NewsCategoryNotFoundException;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

/**
 * @method News|null find($id, $lockMode = null, $lockVersion = null)
 * @method News|null findOneBy(array $criteria, array $orderBy = null)
 * @method News[]    findAll()
 * @method News[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NewsRepository extends ServiceEntityRepository
{
    /**
     * NewsRepository constructor.
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, News::class);
    }

    /**
     * @return News[]
     */
    public function getNewsList()
    {
        return $this->findAll();
    }

    /**
     * @param $id
     * @return News|null
     */
    public function getOne($id)
    {
        return $this->find($id);
    }

    /**
     * @param $newsId
     * @return bool
     */
    public function isNewsExists($newsId)
    {
        $news = $this->find($newsId);
        return !is_null($news);
    }

    /**
     * @param $alias
     * @param $status
     * @return News
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function create($alias, $status): News
    {
        $news = new News();
        $news->setNewsAlias($alias);
        $news->setNewsStatus($status);

        $em = $this->getEntityManager();
        $em->persist($news);
        $em->flush();

        return $news;
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        $em = $this->getEntityManager();
        try {
            $em->remove(
                $em->getReference(News::class, $id)
            );
            $em->flush();
        } catch (ORMException $e) {
            throw new DatabaseException();
        }
    }

    /**
     * @param $id
     * @param $alias
     * @param $status
     * @return News
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function edit($id, $alias, $status)
    {

        if($this->isNewsExists($id)) {
            $news = $this->find($id);
            $news->setNewsAlias($alias);
            $news->setNewsStatus($status);

            $em = $this->getEntityManager();
            $em->persist($news);
            $em->flush();

            return $this->find($id);
        }
        throw new BadRequestHttpException();
    }

    /**
     * @param $id
     * @param NewsCategory $category
     */
    public function bindToCategory($id, NewsCategory $category = null)
    {
        if (!$category) {
            throw new NewsCategoryNotFoundException();
        }

        $news = $this->find($id);

        if (!$news) {
            throw new NewsNotFoundException();
        }

        $news->addCategory($category);

        try {
            $this->getEntityManager()->flush();
        } catch (UniqueConstraintViolationException $e) {
            throw new NewsAlreadyBoundToNewsCategoryException();
        } catch (ORMException $e) {
            throw new DatabaseException();
        }
    }

    /**
     * @param $id
     * @param NewsCategory $category
     */
    public function unbindToCategory($id, NewsCategory $category = null)
    {
        if (!$category) {
            throw new NewsCategoryNotFoundException();
        }

        $news = $this->find($id);

        if (!$news) {
            throw new NewsNotFoundException();
        }

        $news->removeCategory($category);

        try {
            $this->getEntityManager()->flush();
        } catch (ORMException $e) {
            throw new DatabaseException();
        }
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