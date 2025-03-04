<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController{
    public function hello():Response
    {
        return new Response('Hello World');
    }

    #[Route(path: '/helloworld', name: 'app_home_helloworld')]
    public function helloworld():Response
    {
        return new Response('Hello World');
    }

    #[Route(path: '/helloworld/{name}', name: 'app_home_hello')]
    public function helloTo($name):Response
    {
        return new Response('Bonjour ' . $name);
    }
}