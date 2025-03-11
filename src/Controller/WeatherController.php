<?php

namespace App\Controller;

use App\Service\WeatherService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class WeatherController extends AbstractController
{
    #[Route('/weather', name: 'app_weather')]
    public function index(WeatherService $weatherService): Response
    {
        return $this->render('weather/index.html.twig', [
            'controller_name' => 'WeatherController',
        ]);
    }
    #[Route('/weather/toulouse', name: 'app_weather_toulouse')]
    public function showWeather(WeatherService $weatherService): Response
    {
        $weather = $weatherService->getWeather();
        return $this->render('weather/weather.html.twig', [
            'weather' => $weather,
        ]);
    }
}
