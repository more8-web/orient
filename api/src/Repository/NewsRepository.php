<?php

namespace App\Repository;

use App\Entity\Content;
use App\Entity\News;
use App\Exceptions\Common\DatabaseException;
use App\Exceptions\Content\NotFoundContentException;
use App\Exceptions\ContentCategory\ContentAlreadyBoundToContentCategoryException;
use App\Exceptions\News\NewsNotFoundException;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Proxy\Proxy;
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
     * @return Proxy|object|null
     */
    public function getOne($id)
    {
        return $this->find($id);
    }

    /**
     * @param $id
     * @return News | null
     */
    public function getReference($id)
    {
        try {
            $news = $this->getEntityManager()->getReference(News::class, $id);
        } catch (ORMException $e) {
            throw new DatabaseException();
        }

        if ($news instanceof News) {
            return $news;
        }

        return null;
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
     * @param Content|null $content
     */
    public function bindToContent($id, Content $content = null)
    {
        if (!$content) {
            throw new NotFoundContentException();
        }

        $news = $this->find($id);

        if (!$news) {
            throw new NewsNotFoundException();
        }

        $news->addContent($content);

        try {
            $this->getEntityManager()->flush();
        } catch (ORMException $e) {
            throw new ContentAlreadyBoundToContentCategoryException();
        }
    }

    /**
     * @param $id
     * @param Content|null $content
     */
    public function unbindToContent($id, Content $content = null)
    {
        if (!$content) {
            throw new NotFoundContentException();
        }

        $news = $this->find($id);

        if (!$news) {
            throw new NotFoundContentException();
        }

        $news->removeContent($content);

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