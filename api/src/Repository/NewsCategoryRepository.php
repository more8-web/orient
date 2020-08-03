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

/**
 * @method NewsCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method NewsCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method NewsCategory[]    findAll()
 * @method NewsCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NewsCategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NewsCategory::class);
    }

    /**
     * @param $parentId
     * @param $newsCategoryAlias
     * @return NewsCategory
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function create($parentId, $newsCategoryAlias){

        $newsCategory = new NewsCategory();
        $newsCategory->setNewsCategoryParentId($parentId);
        $newsCategory->setNewsCategoryAlias($newsCategoryAlias);

        $em = $this->getEntityManager();
        $em->persist($newsCategory);
        $em->flush();

        return $newsCategory;
    }

    /**
     * @param $newsCategoryAlias
     * @return bool
     */
    public function isNewsCategoryExists($newsCategoryAlias){

        if($this->findOneBy(['news_category_alias' => $newsCategoryAlias])){
            return true;
        }
            return false;
    }

    /**
     * @param $id
     * @param $parentId
     * @param $alias
     * @return NewsCategory|null
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function edit($id, $parentId, $alias){

        $content = $this->find($id);
        $content->setNewsCategoryParentId($parentId);
        $content->setNewsCategoryAlias($alias);

        $em = $this->getEntityManager();
        $em->flush();

        return $content;
    }

    /**
     * @param $id
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function delete($id)
    {
        $newsCategory = $this->find($id);
        if (!is_null($newsCategory)) {

            $em = $this->getEntityManager();
            $em->remove($newsCategory);
            $em->flush();
        }
    }

    /**
     * @return NewsCategory[]
     */
    public function getNewsCategoryList()
    {
        return $this->findAll();
    }

    /**
     * @param $id
     * @return NewsCategory|null
     */
    public function getOneNewsCategory($id)
    {
        return $this->find($id);
    }

    /**
     * @param $id
     * @return NewsCategory | null
     */
    public function getReference($id)
    {
        try {
            $category = $this->getEntityManager()->getReference(NewsCategory::class, $id);
        } catch (ORMException $e) {
            throw new DatabaseException();
        }

        if ($category instanceof NewsCategory) {
            return $category;
        }

        return null;
    }

    /**
     * @param $id
     * @param News|null $news
     */
    public function bindToNews($id, News $news = null)
    {
        if (!$news) {
            throw new NewsNotFoundException();
        }

        $newsCategory = $this->getReference($id);
        if (!$newsCategory) {
            throw new NewsCategoryNotFoundException();
        }

        $news->addCategory($newsCategory);

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
     * @param News|null $news
     */
    public function unbindToNews($id, News $news = null)
    {
        if (!$news) {
            throw new NewsNotFoundException();
        }

        $newsCategory = $this->find($id);

        if (!$newsCategory) {
            throw new NewsCategoryNotFoundException();
        }

        $news->removeCategory($newsCategory);

        try {
            $this->getEntityManager()->flush();
        } catch (ORMException $e) {
            throw new DatabaseException();
        }
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
