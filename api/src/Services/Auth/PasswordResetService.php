<?php


namespace App\Services\Auth;

use App\Entity\User;
use App\Exceptions\DatabaseException;
use App\Exceptions\MailerException;
use App\Exceptions\NotFoundEmailException;
use App\Repository\UserRepository;
use Exception;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class PasswordResetService
{
    /** @var UserRepository */
    protected $repo;

    /** @var MailerInterface */
    protected $mailer;

    public function __construct(UserRepository $repo, MailerInterface $mailer)
    {
        $this->repo = $repo;
        $this->mailer = $mailer;
    }

    /**
     * @param $email
     */
    public function passwordReset($email)
    {
        if (!$this->repo->isEmailExists($email)) {
            throw new NotFoundEmailException();
        }

        try {
            $user = $this->repo->findByEmail($email);
            $this->repo->createPasswordResetConfirmationCode($user);
        } catch (Exception $e) {
            throw (new DatabaseException())->setDebugInfo($e->getMessage());
        }

        try {
            $this->sendResetPasswordEmail($user);
        } catch (TransportExceptionInterface $e) {
            throw (new MailerException())->setDebugInfo($e->getMessage());
        }
    }

    /**
     * @param User $user
     * @throws TransportExceptionInterface
     */
    public function sendResetPasswordEmail(User $user)
    {
        $adminEmail = $_ENV['MAILER_FROM_EMAIL'];
        $schema = $_ENV['ADMIN_CLIENT_SCHEMA'];
        $host = $_ENV['ADMIN_CLIENT_HOST'];
        $path = $_ENV['ADMIN_CLIENT_PASSWORD_RESET_COMPLETE_PATH'];
        $code = $user->getConfirmationCode();

        $resetPasswordEmail = (new Email())
            ->from($adminEmail)
            ->to($user->getEmail())
            ->subject('Welcome to the password reset page!')
            ->text("link for reset password: {$schema}://{$host}/{$path}?resetCode={$code}");

        $this->mailer->send( $resetPasswordEmail);
    }

}
