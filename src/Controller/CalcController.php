<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CalcController extends AbstractController
{
    #[Route('/calc/{nb1}/{nb2}/{ope}', name: 'app_calc')]
    public function calc($nb1,$nb2,$ope): Response
    {
        $result= 0;
        if(is_numeric($nb1) && is_numeric($nb2)){
            switch ($ope){
                case "add":
                    $result = $nb1 + $nb2;
                    $ope = "+";
                    break;

                case "sous":
                    $result = $nb1 - $nb2;
                    $ope = "-";
                    break;
                
                case "multi":
                    $result = $nb1 * $nb2;
                    $ope = "*";
                    break;

                case "div":
                    if($nb2 !=0){
                        $result = $nb1/$nb2;
                        $ope = "/";
                    }
                    break;

                default:
                break;
            }
        }
        return $this->render('calc/index.html.twig', [
            'nb1' => $nb1,
            'nb2' => $nb2,
            'ope' => $ope,
            'result' => $result,
        ]);
    }
}
