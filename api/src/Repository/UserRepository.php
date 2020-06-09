<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository
{
    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->userName;
    }
    public $email;
    public $userName;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    /**
     * @param $email
     * @return User Returns a User object
     */
    public function findByEmail($email)
    {
        return $this->findOneBy(["email" => $email]);
    }

    /**
     * @param $email
     * @return bool
     */
    public function isEmailExists($email)
    {
        $user = $this->findByEmail($email);
        return !is_null($user);
    }

    /**
     * @param $email
     * @param $password
     * @param $roleId
     * @return User
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function createUser($email, $password, $roleId)
    {
        $user = new User();
        $user->setEmail($email);
        $user->setPassword(md5($password));
        $user->setConfirmationCode(md5($email . $password));
        $user->setRoleId($roleId);

        $em = $this->getEntityManager();
        $em->persist($user);
        $em->flush();

        return $user;
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

    /**
     * @return mixed
     */

}
