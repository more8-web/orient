<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;
use Exception;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository implements UserProviderInterface
{
    /**
     * @var UserPasswordEncoderInterface
     */
    protected $encoder;

    public function __construct(ManagerRegistry $registry,  UserPasswordEncoderInterface $encoder)
    {
        parent::__construct($registry, User::class);
        $this->encoder = $encoder ;
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
     * @param $confirmationCode
     * @return User|null
     */
    public function findUserByConfirmationCode($confirmationCode)
    {
        return $this->findOneBy(["confirmationCode" => $confirmationCode]);
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
     * @param UserInterface $user
     * @param $password
     * @return bool
     */
    public function isPasswordValid(UserInterface $user, $password)
    {
        return $this->getEncoder()->isPasswordValid($user, $password);
    }

    /**
     * @param $email
     * @param $password
     * @return User
     * @throws ORMException
     * @throws OptimisticLockException
     * @throws Exception
     */
    public function createUser($email, $password): User
    {
        $user = new User();
        $user->setEmail($email);
        $user->setSalt(md5(random_bytes(16)));
        $user->setPassword($this->getEncoder()->encodePassword($user, $password));
        $user->setConfirmationCode(md5($email));

        $em = $this->getEntityManager();
        $em->persist($user);
        $em->flush();

        return $user;
    }

    /**
     * @return UserPasswordEncoderInterface
     */
    public function getEncoder()
    {
        return $this->encoder;
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function flush()
    {
        $this->getEntityManager()->flush();
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
     * @param string $username
     * @return void
     */
    public function loadUserByUsername(string $username)
    {
        // TODO: Implement loadUserByUsername() method.
    }

    /**
     * @param UserInterface $user
     * @return void
     */
    public function refreshUser(UserInterface $user)
    {
        // TODO: Implement refreshUser() method.
    }

    /**
     * @param string $class
     * @return void
     */
    public function supportsClass(string $class)
    {
        // TODO: Implement supportsClass() method.
    }
}
