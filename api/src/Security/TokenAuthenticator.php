<?php


namespace App\Security;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Guard\AbstractGuardAuthenticator;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\User\UserProviderInterface;

class TokenAuthenticator extends AbstractGuardAuthenticator
{
    /**
     * Вызывается по каждому запросу. Верните те сертификаты, которые вы
     * хотите передать getUser(). Возвращение "null" приведёт к пропуску
     * аутентификатора.
     * @param Request $request
     * @return null[]
     */
    public function getCredentials(Request $request)
    {
        if (!$token = $request->headers->get('X-AUTH-TOKEN')) {
            // Нет токена?
            $token = null;
        }

        // То, что вы возвращаете здесь, будет передано getUser() как $credentials
        return array(
            'token' => $token,
        );
    }

    public function getUser($credentials, UserProviderInterface $userProvider)
    {
        $apiKey = $credentials['token'];

        if (null === $apiKey) {
            return false;
        }

        // если null, то аутентификация будет неудачной
        // если объект Пользователя, то вызывается checkCredentials()
        return $userProvider->loadUserByUsername($apiKey);
    }

    public function checkCredentials($credentials, UserInterface $user)
    {
        // проверить сертификаты - например, убедиться, что пароль валидный
        // в этом случае проверка сертификатов не требуется

        // вернуть true, чтобы аутентификация прошла успешно
        return true;
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey)
    {
        // при успехе, позвольте запросу продолжать
        return null;
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception)
    {
        $data = array(
            'message' => strtr($exception->getMessageKey(), $exception->getMessageData())

            // или, чтобы перевести это сообщение
            // $this->translator->trans($exception->getMessageKey(), $exception->getMessageData())
        );

        return new JsonResponse($data, Response::HTTP_FORBIDDEN);
    }

    /**
     * Вызывается, когда нужна аутентификация, но не отправляется
     * @param Request $request
     * @param AuthenticationException|null $authException
     * @return JsonResponse
     */
    public function start(Request $request, AuthenticationException $authException = null)
    {
        $data = array(
            // вы можете перевести это сообщение
            'message' => 'Authentication Required'
        );

        return new JsonResponse($data, Response::HTTP_UNAUTHORIZED);
    }

    public function supportsRememberMe()
    {
        return false;
    }

    /**
     * @param Request $request
     * @return void
     */
    public function supports(Request $request)
    {
        // TODO: Implement supports() method.
    }
}