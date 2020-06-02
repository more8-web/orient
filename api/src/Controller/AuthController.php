<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Swagger\Annotations as SWG;

class AuthController extends AbstractApiController
{
    /**
     * @Route("/register", name="register", methods={"POST"})
     * @SWG\Post(
     *    tags={"Authorization"},
     *    summary="Register new user",
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="Request with user email",
     *         required=true,
     *         @SWG\Schema(
     *             @SWG\Property(property="email", type="string", example="nickname@server.com")
     *         )
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Start registration proccess"
     *     ),
     * )
     */
    public function register(Request $request)
    {
        $data = $this->getJson($request);

        return $this->json([
            "success" => $data["email"]
        ]);
    }

    /**
     * @Route("/register/complete", name="registerComplete", methods={"POST"})
     * @SWG\Post(
     *    tags={"Authorization"},
     *    summary="Complete register with email code",
     *     @SWG\Parameter(
     *         name="emailCode",
     *         in="body",
     *         description="Request with email code",
     *         required=true,
     *         @SWG\Schema(
     *             @SWG\Property(property="email_code", type="string", example="nickname@server.com")
     *         )
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Complete registration proccess"
     *     ),
     * )
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
     *         @SWG\Schema(
     *             @SWG\Property(property="email", type="string", example="user@host.zone"),
     *             @SWG\Property(property="password", type="string", example="password")
     *         )
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Start login proccess"
     *     ),
     * )
     */
    public function login(Request $request)
    {
        $data = $this->getJson($request);

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
     *         @SWG\Schema(
     *             @SWG\Property(property="email", type="string", example="user@host.zone"),
     *         )
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Start login proccess"
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
     *         @SWG\Schema(
     *             @SWG\Property(property="new_password", type="string", example="qwerty"),
     *             @SWG\Property(property="old_password", type="string", example="123456")
     *         )
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Start login proccess"
     *     ),
     * )
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
     *    summary="Password reset",
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="Request for password reset",
     *         required=true,
     *         @SWG\Schema(
     *             @SWG\Property(property="message", type="string", example="Password has been changed"),
     *         )
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Start login proccess"
     *     ),
     * )
     */
    public function passwordResetComplete(Request $request)
    {
        $data = $this->getJson($request);

        return $this->json([
            "success" => $data
        ]);
    }
    
}
