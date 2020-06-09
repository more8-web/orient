<?php

namespace App\Controller;

use App\Controller\Dto as DTO;
use App\Exceptions\AbstractApiException;
use App\Services\Auth\RegisterService;
use Nelmio\ApiDocBundle\Annotation\Model;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
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
     * @throws \Exception
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
     *         name="emailCode",
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
     * @return JsonResponse
     */
    public function registerComplete(Request $request)
    {
        return $this->json([
            "success" => $this->getJson($request)
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
     */
    public function login(Request $request)
    {
        $data = $this->getDto($request, DTO\LoginRequestBody::class);

        return $this->json([
            "success" => $data
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
     */
    public function logout(Request $request)
    {
        $data = $this->getJson($request);

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
