<?php

namespace App\Services\Auth;

use App\Entity\User;
use App\Exceptions\DatabaseException;
use App\Exceptions\MailerException;
use App\Exceptions\UserAlreadyRegisteredException;
use App\Repository\UserRepository;
use Doctrine\DBAL\Exception\ConnectionException;
use Doctrine\ORM\ORMException;
use Symfony\Component\Mailer\Bridge\Google\Transport\GmailSmtpTransport;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;


class RegisterService
{
    /** @var UserRepository */
    protected $repo;
    protected $mailer;

    public function __construct(UserRepository $repo, MailerInterface $mailer)
    {
        $this->repo = $repo;
        $this->mailer = $mailer;
    }

    /**
     * @param $email
     * @param $password
     * @return string
     */
    public function register($email, $password)
    {
        try {
            if ($this->repo->isEmailExists($email)) {
                throw new UserAlreadyRegisteredException();
            }

            $user = $this->repo->createUser($email, $password);
        } catch (ORMException | ConnectionException $e) {
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
        $confirmEmail = (new Email())
            ->from('qweqwe@qwqw')
            ->to($user->getEmail())
            ->subject('Welcome to the Space Bar!')
            ->text('link for confirm email: http://api/register/complete?emailCode=' . $user->getConfirmationCode());

        $this->mailer->send($confirmEmail);
    }

}