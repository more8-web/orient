<?php

namespace App\Repository;

use App\Entity\Content;
use App\Entity\News;
use App\Exceptions\Common\DatabaseException;
use App\Exceptions\Content\ContentAlreadyBoundToNewsException;
use App\Exceptions\Content\NotFoundContentException;
use App\Exceptions\News\NewsNotFoundException;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Content|null find($id, $lockMode = null, $lockVersion = null)
 * @method Content|null findOneBy(array $criteria, array $orderBy = null)
 * @method Content[]    findAll()
 * @method Content[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Content::class);
    }

    /**
     * @param $alias
     * @param $desc
     * @param $value
     * @return Content
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function create($alias, $desc, $value){

        $content = new Content();
        $content->setContentAlias($alias);
        $content->setContentDescription($desc);
        $content->setContentValue($value);

        $em = $this->getEntityManager();
        $em->persist($content);
        $em->flush();

        return $content;
    }

    /**
     * @param $alias
     * @return bool
     */
    public function isContentExists($alias){

        if($this->findOneBy(['content_alias' => $alias])){
            return true;
        }
            return false;
    }

    /**
     * @param $id
     * @param $alias
     * @param $desc
     * @param $value
     * @return Content|null
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function edit($id, $alias, $desc, $value){

        $content = $this->find($id);
        $content->setContentAlias($alias);
        $content->setContentDescription($desc);
        $content->setContentValue($value);

        $em = $this->getEntityManager();
        $em->flush();

        return $content;
    }

    /**
     * @param $id
     * @return void
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function delete($id)
    {

        $content = $this->find($id);
        if (!is_null($content)) {

            $em = $this->getEntityManager();
            $em->remove($content);
            $em->flush();
        }
    }

    /**
     * @param $id
     * @return Content
     */
    public function getOne($id){
        /** @var Content $content */
        $content = $this->find($id);

        return $content;
    }

    /**
     * @param $newsId
     * @return Content[]
     */
    public function getContentListByNews($newsId)
    {
        return $this->findBy(['news_id'=>$newsId]);
    }

    /**
     * @param $newsId
     * @param $contentId
     * @return Content|null
     */
    public function getContentByNews($newsId, $contentId)
    {
        return $this->findOneBy(['news_id'=>$newsId, 'content_id' => $contentId]);
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

        $content = $this->find($id);

        if (!$content) {
            throw new NotFoundContentException();
        }

        $content->addNews($news);

        try {
            $this->getEntityManager()->flush();
        } catch (ORMException $e) {
            throw new ContentAlreadyBoundToNewsException();
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

        $content = $this->find($id);

        if (!$content) {
            throw new NotFoundContentException();
        }

        $content->removeNews($news);

        try {
            $this->getEntityManager()->flush();
        } catch (ORMException $e) {
            throw new DatabaseException();
        }
    }

    // /**
    //  * @return Contents[] Returns an array of Contents objects
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
    public function findOneBySomeField($value): ?Contents
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
