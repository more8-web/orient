<?php

namespace App\Repository;

use App\Entity\Content;
use App\Entity\ContentCategory;
use App\Exceptions\Common\DatabaseException;
use App\Exceptions\Content\NotFoundContentException;
use App\Exceptions\ContentCategory\ContentAlreadyBoundToContentCategoryException;
use App\Exceptions\ContentCategory\NotFoundContentCategoryException;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ContentCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContentCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContentCategory[]    findAll()
 * @method ContentCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContentCategoriesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ContentCategory::class);
    }

    /**
     * @param $parentId
     * @param $alias
     * @return ContentCategory
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function create($parentId, $alias): ContentCategory
    {
        $contentCategory = new ContentCategory();
        $contentCategory->setContentCategoryParentId($parentId);
        $contentCategory->setContentCategoryAlias($alias);

        $em = $this->getEntityManager();
        $em->persist($contentCategory);
        $em->flush();

        return $contentCategory;
    }

    /**
     * @param $id
     * @param null $parentId
     * @param $alias
     * @return ContentCategory
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function edit($id, $parentId, $alias): ContentCategory
    {

           if(!$contentCategory = $this->find($id)){
            throw new NotFoundContentCategoryException();
        }

        $contentCategory->setContentCategoryParentId($parentId);
        $contentCategory->setContentCategoryAlias($alias);
        $em = $this->getEntityManager();
        $em->flush();

        return $contentCategory = $this->find($id);

    }

    /**
     * @param $id
     * @return bool
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function delete($id)
    {
        $contentCategory = $this->find($id);

        $em = $this->getEntityManager();
        $em->remove($contentCategory);
        $em->flush();

        return true;
    }

    /**
     * @param $id
     * @return ContentCategory
     */
    public function getOne($id): ContentCategory
    {
       return  $this->find($id);
    }

    /**
     * @return ContentCategory[]
     */
    public function getContentCategoryList()
    {
        return  $this->findAll();
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

        $contentCategory = $this->find($id);

        if (!$contentCategory) {
            throw new NotFoundContentCategoryException();
        }

        $content->addCategories($contentCategory);

        try {
            $this->getEntityManager()->flush();
        } catch (UniqueConstraintViolationException $e) {
            throw new ContentAlreadyBoundToContentCategoryException();
        } catch (ORMException $e) {
            throw new DatabaseException();
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

        $contentCategory = $this->find($id);

        if (!$contentCategory) {
            throw new NotFoundContentCategoryException();
        }

        $content->removeCategories($contentCategory);

        try {
            $this->getEntityManager()->flush();
        } catch (ORMException $e) {
            throw new DatabaseException();
        }
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
