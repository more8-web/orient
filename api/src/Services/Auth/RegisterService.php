<?php

namespace App\Services\Auth;

use App\Entity\User;
use App\Exceptions\DatabaseException;
use App\Exceptions\MailerException;
use App\Exceptions\UserAlreadyRegisteredException;
use App\Repository\UserRepository;
use Doctrine\ORM\ORMException;
use Exception;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class RegisterService
{
    /** @var UserRepository */
    protected $repo;
    protected $mailer;
    protected $encoder;

    public function __construct(UserRepository $repo, MailerInterface $mailer)
    {
        $this->repo = $repo;
        $this->mailer = $mailer;
    }

    /**
     * @param $email
     * @param $password
     * @return User
     * @throws Exception
     */
    public function register($email, $password)
    {
        try {
            if ($this->repo->isEmailExists($email)) {
                throw new UserAlreadyRegisteredException();
            }

            $user = $this->repo->createUser($email, $password);
        } catch (ORMException $e) {
            throw (new DatabaseException())->setDebugInfo($e->getMessage());
        }

        try {
            $this->sendConfirmEmail($user);
        } catch (TransportExceptionInterface $e) {
            throw (new MailerException())->setDebugInfo($e->getMessage());
        }

        return $user;
    }

    /**
     * @param User $user
     * @throws TransportExceptionInterface
     */
    public function sendConfirmEmail(User $user)
    {
        $adminEmail = $_ENV['MAILER_FROM_EMAIL'];
        $schema = $_ENV['ADMIN_CLIENT_SCHEMA'];
        $host = $_ENV['ADMIN_CLIENT_HOST'];
        $path = $_ENV['ADMIN_CLIENT_REGISTER_COMPLETE_PATH'];
        $code = $user->getConfirmationCode();

        $confirmEmail = (new Email())
            ->from($adminEmail)
            ->to($user->getEmail())
            ->subject('Welcome to the Space Bar!')
            ->text("link for confirm email: {$schema}://{$host}/{$path}?emailCode={$code}");

        $this->mailer->send($confirmEmail);
    }
}

