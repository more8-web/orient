<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AuthController extends AbstractController
{
    /**
     * 
     * @Route("/register", name="auth", methods={"POST"})
     */
    public function register()
    {
        return $this->json([
            "success" => true
        ]);
    }
}
