<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class UserController extends AbstractController
{
    #[Route('/user/signUp', name: 'app_user')]
    public function SignUp(): Response
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    #[Route('/user/signIn', name: 'app_user_signIn')]
    public function SingIn(): Response
    {
        return $this->render('user/SignIn.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }
}
