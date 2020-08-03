<?php

namespace App\Controller;

use App\Controller\Dto\Request as RequestAuth;
use App\Controller\Dto\Response as ResponseAuth;
use App\Services\Auth\LoginService;
use App\Services\Auth\LogoutService;
use App\Services\Auth\PasswordResetCompleteService;
use App\Services\Auth\PasswordResetService;
use App\Services\Auth\RegisterCompleteService;
use App\Services\Auth\RegisterService;
use Exception;
use Nelmio\ApiDocBundle\Annotation\Model;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Swagger\Annotations as SWG;

class AuthController extends AbstractApiController
{
    /**
     * @Route("/register", methods={"POST"})
     * @SWG\Post(
     *    tags={"Authorization"},
     *    summary="Register new user",
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="Request with user email",
     *         required=true,
     *         @Model(type=RequestAuth\Register::class)
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Start registration proccess",
     *         @Model(type=ResponseAuth\Register::class)
     *     ),
     * )
     * @param Request $request
     * @param RegisterService $service
     * @return JsonResponse
     * @throws Exception
     */
    public function register(Request $request, RegisterService $service)
    {
        /** @var RequestAuth\Register $dto */
        $dto = $this->getDto($request, RequestAuth\Register::class);
        $service->register($dto->getEmail(), $dto->getPassword());

        return $this->json(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @Route("/register/complete", name="register complete", methods={"POST"})
     * @SWG\Post(
     *    tags={"Authorization"},
     *    summary="Complete register with email code",
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="Request complete registration",
     *         required=true,
     *         @Model(type=RequestAuth\RegisterComplete::class)
     *         )
     *     ),
     * @SWG\Response(
     *         response=200,
     *         description="Complete registration proccess",
     *         @Model(type=ResponseAuth\RegisterComplete::class)
     *     ),
     * )
     * @param Request $request
     * @param RegisterCompleteService $service
     * @return JsonResponse
     * @throws Exception
     */
    public function registerComplete(Request $request, RegisterCompleteService $service)
    {
        /** @var RequestAuth\RegisterComplete $dto */
        $dto = $this->getDto($request, RequestAuth\RegisterComplete::class);
        $token = $service->registerComplete($dto->getConfirmationCode());

        return $this->json((new ResponseAuth\RegisterComplete($token))->asArray());
    }

    /**
     * @Route("/login", name="login", methods={"POST"})
     * @SWG\Post(
     *    tags={"Authorization"},
     *    summary="User login",
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="Request body with email and password",
     *         required=true,
     *         @Model(type=RequestAuth\Login::class)
     *         )
     *     ),
     * @SWG\Response(
     *         response=200,
     *         description="Start login-form proccess",
     *         @Model(type=ResponseAuth\Login::class)
     *     ),
     * )
     * @param Request $request
     * @param LoginService $service
     * @return JsonResponse
     * @throws Exception
     */
    public function login(Request $request, LoginService $service)
    {
        $dto = $this->getDto($request, RequestAuth\Login::class);
        $token = $service->login($dto->getEmail(), $dto->getPassword());

        return $this->json((new ResponseAuth\Login($token)));
    }

    /**
     * @Route("/logout", name="logout", methods={"POST"})
     * @SWG\Post(
     *    tags={"Authorization"},
     *    summary="User logout",
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="Request body with email",
     *         required=true,
     *         @Model(type=RequestAuth\Logout::class)
     *         )
     *     ),
     * @SWG\Response(
     *         response=200,
     *         description="Start logout proccess",
     *         @Model(type=ResponseAuth\Logout::class)
     *     ),
     * )
     * @param Request $request
     * @param LogoutService $service
     * @return JsonResponse
     */
    public function logout(Request $request, LogoutService $service)
    {
        $dto = $this->getDto($request, RequestAuth\Logout::class);
        $service->logout($dto->getEmail());

        return $this->json([
            "success" => $dto
        ]);
    }

    /**
     * @Route("/password/reset", name="passwordReset", methods={"POST"})
     * @SWG\Post(
     *    tags={"Authorization"},
     *    summary="Password reset",
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="Request for password reset",
     *         required=true,
     *         @Model(type=RequestAuth\PasswordReset::class)
     *         )
     *     ),
     * @SWG\Response(
     *         response=204,
     *         description="Start login-form proccess",
     *     ),
     * )
     * @param Request $request
     * @param PasswordResetService $service
     * @return JsonResponse
     */
    public function passwordReset(Request $request, PasswordResetService $service): JsonResponse
    {
        $dto = $this->getDto($request, RequestAuth\PasswordReset::class);
        $service->passwordReset($dto->getEmail());

        return $this->json(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @Route("/password/reset/complete", name="passwordResetComplete", methods={"POST"})
     * @SWG\Post(
     *    tags={"Authorization"},
     *    summary="Password reset complete",
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="Request for password reset complete",
     *         required=true,
     *         @Model(type=RequestAuth\PasswordResetComplete::class)
     *         )
     *     ),
     * @SWG\Response(
     *         response=200,
     *         description="Response password reset complete",
     *         @Model(type=ResponseAuth\PasswordResetComplete::class)
     *     ),
     * )
     * @param Request $request
     * @param PasswordResetCompleteService $service
     * @return JsonResponse
     * @throws Exception
     */
    public function passwordResetComplete(Request $request, PasswordResetCompleteService $service)
    {
        $dto = $this->getDto($request, RequestAuth\PasswordResetComplete::class);
        $token = $service->passwordResetComplete($dto->getConfirmationCode(), $dto->getNewPassword());

        return $this->json((new ResponseAuth\PasswordResetComplete($token))->asArray());
    }
}
