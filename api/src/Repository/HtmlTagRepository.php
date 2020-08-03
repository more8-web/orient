<?php

namespace App\Repository;

use App\Entity\Content;
use App\Entity\HtmlTag;
use App\Exceptions\Common\DatabaseException;
use App\Exceptions\Content\NotFoundContentException;
use App\Exceptions\HtmlTags\NotFoundHtmlTagException;
use App\Exceptions\News\NewsAlreadyBoundToNewsCategoryException;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method HtmlTag|null find($id, $lockMode = null, $lockVersion = null)
 * @method HtmlTag|null findOneBy(array $criteria, array $orderBy = null)
 * @method HtmlTag[]    findAll()
 * @method HtmlTag[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HtmlTagRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HtmlTag::class);
    }

    /**
     * @param $value
     * @return HtmlTag
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function create($value):HtmlTag
    {

        $htmlTag = new HtmlTag();
        $htmlTag->setHtmlTagValue($value);

        $em = $this->getEntityManager();
        $em->persist($htmlTag);
        $em->flush();

        return $htmlTag;
    }

    /**
     * @param $id
     * @param $value
     * @return HtmlTag|null
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function edit($id, $value)
    {

        $htmlTag = $this->find($id);
        $htmlTag->setHtmlTagValue($value);

        $em = $this->getEntityManager();
        $em->flush();

        return $htmlTag;
    }

    /**
     * @param $id
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function delete($id)
    {
        if (is_null($htmlTag = $this->find($id))) {
           throw new NotFoundHtmlTagException();
        }
            $em = $this->getEntityManager();
            $em->remove($htmlTag);
            $em->flush();
    }

    /**
     * @return HtmlTag[]
     */
    public function getHtmlTagList()
    {
        return $this->findAll();
    }

    /**
     * @param $id
     * @return HtmlTag|null
     */
    public function getHtmlTag($id)
    {
        return $this->find($id);
    }

    public function bindToContent($tagId, Content $content = null)
    {
        if (!$content) {
            throw new NotFoundContentException();
        }

        $htmlTag = $this->find($tagId);

        if (!$htmlTag) {
            throw new NotFoundHtmlTagException();
        }

        $htmlTag->addContent($content);

        try {
            $this->getEntityManager()->flush();
        } catch (UniqueConstraintViolationException $e) {
            throw new NewsAlreadyBoundToNewsCategoryException();
        } catch (ORMException $e) {
            throw new DatabaseException();
        }
    }

    public function unbindToCategory($tagId, Content $content = null)
    {
        if (!$content) {
            throw new NotFoundContentException();
        }

        $htmlTag = $this->find($tagId);

        if (!$htmlTag) {
            throw new NotFoundHtmlTagException();
        }

        $htmlTag->removeContent($content);

        try {
            $this->getEntityManager()->flush();
        } catch (ORMException $e) {
            throw new DatabaseException();
        }
    }

    // /**
    //  * @return HtmlTag[] Returns an array of HtmlTag objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?HtmlTag
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
