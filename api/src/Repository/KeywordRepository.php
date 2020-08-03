<?php

namespace App\Repository;

use App\Entity\Content;
use App\Entity\Keyword;
use App\Entity\News;
use App\Exceptions\Common\DatabaseException;
use App\Exceptions\Content\NotFoundContentException;
use App\Exceptions\Keyword\KeywordAlreadyBoundToContentException;
use App\Exceptions\Keyword\KeywordAlreadyBoundToNewsException;
use App\Exceptions\Keyword\NotFoundKeywordException;
use App\Exceptions\News\NewsNotFoundException;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Keyword|null find($id, $lockMode = null, $lockVersion = null)
 * @method Keyword|null findOneBy(array $criteria, array $orderBy = null)
 * @method Keyword[]    findAll()
 * @method Keyword[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KeywordRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Keyword::class);
    }

    /**
     * @param $value
     * @return bool
     */
    public function isKeywordExists($value){

        if($this->findOneBy(['keyword_value' => $value])){
            return true;
        }
            return false;
    }

    /**
     * @param $value
     * @return Keyword
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function create($value){

        $keyword = new Keyword();
        $keyword->setKeywordValue($value);

        $em = $this->getEntityManager();
        $em->persist($keyword);
        $em->flush();

        return $keyword;
    }

    /**
     * @param $id
     * @param $value
     * @return Keyword|null
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function edit($id, $value){

        $content = $this->find($id);
        $content->setKeywordValue($value);

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

        $keyword = $this->find($id);
        if (!is_null($keyword)) {

            $em = $this->getEntityManager();
            $em->remove($keyword);
            $em->flush();
        }
    }

    /**
     * @return Keyword[]
     */
    public function getKeywordList()
    {
        return $this->findAll();
    }

    /**
     * @param $id
     * @return Keyword|null
     */
    public function getOneKeyword($id)
    {
        return $this->find($id);
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

        $keyword = $this->find($id);

        if(!$keyword) {
            throw new NotFoundKeywordException();
        }

        $keyword->addNews($news);

        try {
            $this->getEntityManager()->flush();
        } catch (UniqueConstraintViolationException $e) {
            throw new KeywordAlreadyBoundToNewsException();
        } catch (ORMException $e) {
            throw new DatabaseException();
            }
    }

    /**
     * @param $id
     * @param News|null $news
     */
    public function unbindKeywordToNews($id, News $news = null)
    {
        if(!$news){
            throw new NewsNotFoundException();
        }

        $keyword = $this->find($id);

        if (!$keyword){
            throw new NotFoundKeywordException();
        }

        $keyword->removeNews($news);

        try {
            $this->getEntityManager()->flush();
        } catch (ORMException $e) {
            throw new DatabaseException();
        }
    }

    /**
     * @param $id
     * @return Keyword[]
     */
    public function getKeywordListByNews($id)
    {
        return $this->findBy(['new_id'=>$id]);
    }

    /**
     * @param $keywordId
     * @param $newsId
     * @return Keyword|null
     */
    public function getKeywordByNews($keywordId, $newsId)
    {
        return $this->findOneBy(['keyword_id'=>$keywordId, 'news_id'=>$newsId]);
    }

    /**
     * @param $keywordId
     * @param Content $content
     */
    public function bindToContent($keywordId, Content $content = null)
    {
        if (!$content) {
            throw new NotFoundContentException();
        }

        $keyword = $this->find($keywordId);

        if (!$keyword) {
            throw new NotFoundKeywordException();
        }

        $keyword->addContent($content);

        try {
            $this->getEntityManager()->flush();
        } catch (UniqueConstraintViolationException $e) {
            throw new KeywordAlreadyBoundToContentException();
        } catch (ORMException $e) {
            throw new DatabaseException();
        }
    }

    /**
     * @param $keywordId
     * @param Content $content
     */
    public function unbindToContent($keywordId, Content $content = null)
    {
        if (!$content) {
            throw new NotFoundContentException();
        }

        $keyword = $this->find($keywordId);

        if (!$keyword) {
            throw new NotFoundKeywordException();
        }

        $keyword->removeContent($content);

        try {
            $this->getEntityManager()->flush();
        } catch (ORMException $e) {
            throw new DatabaseException();
        }
    }

    /**
     * @param $id
     * @return Keyword[]
     */
    public function getKeywordListByContent($id)
        {
            return $this->findBy(['content_id' => $id]);
        }

    /**
     * @param $keywordId
     * @param $newsId
     * @return Keyword|null
     */
    public function getKeywordByContent($keywordId, $newsId)
    {
        return $this->findOneBy(['keyword_id'=>$keywordId, 'content_id'=>$newsId]);
    }


    // /**
    //  * @return Keywords[] Returns an array of Keywords objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('k.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Keywords
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
