<?php


namespace App\Services\Auth;

use App\Entity\User;
use App\Exceptions\MailerException;
use App\Exceptions\NotFoundEmailException;
use App\Repository\UserRepository;
use Doctrine\DBAL\Exception\{ConnectionException};
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class PasswordResetService
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

    public function resetPassword($email): User
    {
        if (!$this->repo->isEmailExists($email)) {
            throw new NotFoundEmailException();
        }

        $user = $this->repo->findByEmail($email);

        try {
            $this->sendResetPasswordEmail($user);
        } catch (TransportExceptionInterface $e) {
            throw (new MailerException())->setDebugInfo($e->getMessage());
        }
        return $user;
    }

    public function sendResetPasswordEmail(User $user)
    {
        $resetPasswordEmail = (new Email())
            ->from('qweqwe@qwqw')
            ->to($user->getEmail())
            ->subject('Welcome to the password reset page!')
            ->text('link for reset password: http://api/password/reset/complete?emailCode=' . $user->getConfirmationCode());

        $this->mailer->send( $resetPasswordEmail);
    }

}