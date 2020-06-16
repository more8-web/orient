<?php

namespace App\Controller;

use App\Controller\Dto as DTO;
use App\Services\Auth\LoginService;
use App\Services\Auth\LogoutService;
use App\Services\Auth\RegisterCompleteService;
use App\Services\Auth\RegisterService;
use Exception as ExceptionAlias;
use Nelmio\ApiDocBundle\Annotation\Model;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Swagger\Annotations as SWG;
use App\Entity\User;

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
     *         @Model(type=DTO\RegisterRequestBody::class)
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Start registration proccess",
     *         @Model(type=DTO\RegisterResponseBody::class)
     *     ),
     * )
     * @param Request $request
     * @param RegisterService $service
     * @return JsonResponse
     * @throws ExceptionAlias
     */
    public function register(Request $request, RegisterService $service)
    {
        /** @var DTO\RegisterRequestBody $dto */
        $dto = $this->getDto($request, DTO\RegisterRequestBody::class);

        return $this->json([
            "success" => $service->register($dto->getEmail(), $dto->getPassword())
        ]);
    }


    /**
     * @Route("/register/complete", methods={"POST"})
     * @SWG\Post(
     *    tags={"Authorization"},
     *    summary="Complete register with email code",
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="Request complete registration",
     *         required=true,
     *         @Model(type=DTO\RegisterCompleteRequestBody::class)
     *         )
     *     ),
     * @SWG\Response(
     *         response=200,
     *         description="Complete registration proccess",
     *         @Model(type=DTO\RegisterCompleteResponseBody::class)
     *     ),
     * )
     * @param Request $request
     * @param RegisterCompleteService $service
     * @return JsonResponse
     */
    public function registerComplete(Request $request, RegisterCompleteService $service)
    {
        /** @var DTO\RegisterCompleteRequestBody $dto */
        $dto = $this->getDto($request, DTO\RegisterCompleteRequestBody::class);
        $confirmationCode = $dto->getConfirmationCode();
        $user = $service->registerComplete($confirmationCode);
        return $this->json([
            "success" => $user->getRoles()
        ]);
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
     *         @Model(type=DTO\LoginRequestBody::class)
     *         )
     *     ),
     * @SWG\Response(
     *         response=200,
     *         description="Start login proccess",
     *         @Model(type=DTO\LoginResponseBody::class)
     *     ),
     * )
     * @param Request $request
     * @param LoginService $service
     * @return JsonResponse
     * @throws ExceptionAlias
     */
    public function login(Request $request, LoginService $service)
    {
        $dto = $this->getDto($request, DTO\LoginRequestBody::class);

        $token = $service->login($dto->getEmail(), $dto->getPassword());
        return $this->json([
            "token" => $token
        ]);
    }


    /**
     * @Route("/logout", name="logout", methods={"POST"})
     * @SWG\Post(
     *    tags={"Authorization"},
     *    summary="User logout",
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="Request with email user",
     *         required=true,
     *         @Model(type=DTO\LogoutRequestBody::class)
     *         )
     *     ),
     * @SWG\Response(
     *         response=200,
     *         description="Start logout proccess",
     *         @Model(type=DTO\LogoutResponseBody::class)
     *     ),
     * )
     * @param Request $request
     * @param LogoutService $service
     * @param User $user
     * @return JsonResponse
     * @throws ExceptionAlias
     */
    public function logout(Request $request, LogoutService $service, User $user)
    {
        $data = $this->getJson($request);
        $service->logout($user);

        return $this->json([
            "success" => $data
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
     *         @Model(type=DTO\PasswordResetRequestBody::class)
     *         )
     *     ),
     * @SWG\Response(
     *         response=200,
     *         description="Start login proccess",
     *         @Model(type=DTO\PasswordResetResponseBody::class)
     *     ),
     * )
     * @param Request $request
     * @return JsonResponse
     */
    public function passwordReset(Request $request)
    {
        $dto = $this->getDto($request, DTO\PasswordResetRequestBody::class);
        $data = $this->getJson($request);

        return $this->json([
            "success" => $data
        ]);
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
     *         @Model(type=DTO\PasswordResetCompleteRequestBody::class)
     *         )
     *     ),
     * @SWG\Response(
     *         response=200,
     *         description="Response password reset complete",
     *         @Model(type=DTO\PasswordResetCompleteResponseBody::class)
     *     ),
     * )
     * @param Request $request
     * @return JsonResponse
     */
    public function passwordResetComplete(Request $request)
    {
        $data = $this->getJson($request);

        return $this->json([
            "success" => $data
        ]);
    }

}
