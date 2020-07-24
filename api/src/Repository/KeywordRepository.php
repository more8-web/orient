<?php

namespace App\Repository;

use App\Entity\Keyword;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
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
