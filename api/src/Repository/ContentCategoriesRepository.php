<?php

namespace App\Repository;

use App\Entity\ContentCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
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
     * @param $alias
     * @param null $parentId
     * @return int|mixed|string
     * @throws NoResultException
     * @throws NonUniqueResultException
     */
    public function isCategoryExists($alias, $parentId = null): bool
    {


        $idColumn = "c.id";
        $parentIdColumn = "c.contentCategoryParentId";
        $aliasColumn = "c.contentCategoryAlias";

        $qb = $this->createQueryBuilder("c");
        $qb->select($qb->expr()->count($idColumn));

        if (is_null($parentId)) {
            $qb->where(
                $qb->expr()->isNull($parentIdColumn)
            );
        } else {
            $qb
                ->where("{$parentIdColumn} = :parentId")
                ->setParameter("parentId", $parentId)
            ;
        }
        $qb
            ->andWhere("{$aliasColumn} = :alias")
            ->setParameter("alias", $alias)
        ;

        return $qb->getQuery()->getSingleScalarResult() > 0;
    }

    /**
     * @param $parentId
     * @param $alias
     * @return ContentCategory
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function addContentCategory($parentId, $alias): ContentCategory
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
    public function setContentCategory($id, $parentId = null, $alias): ContentCategory
    {
        $contentCategory = $this->findOneBy(['id' => $id]);
        $contentCategory->setContentCategoryParentId($parentId);
        $contentCategory->setContentCategoryAlias($alias);
        $em = $this->getEntityManager();
        $em->flush();

        $contentCategory = $this->findOneBy(['id' => $id]);

        return $contentCategory;
    }

    /**
     * @param $id
     * @return bool
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function deleteContentCategory($id): bool
    {
        $contentCategory = $this->findOneBy(['id' => $id]);

        $em = $this->getEntityManager();
        $em->remove($contentCategory);
        $em->flush();

        return true;
    }

    /**
     * @param $id
     * @return ContentCategory
     */
    public function getOneContentCategoryById($id): ContentCategory
    {

       return  $this->findOneBy(['id' => $id]);
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
