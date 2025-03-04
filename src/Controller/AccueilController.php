<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController{

    #[Route(path: '/accueil/{nb1}/{nb2}', name: 'app_home_accueil')]
    public function addition($nb1,$nb2):Response{
        if($nb1 < 0 || $nb2 < 0){
            return new Response("<p> Les nombres sont négatifs.<p>");
        }
        $temp = $nb1+$nb2;
        return new Response("<p> L'addition de ".$nb1." et ".$nb2." est égale au résultat : ".$temp.".<p>");
    }

    #[Route(path: '/accueil/calc/{nb1}/{nb2}/{ope}', name: 'app_home_calc')]
    public function calculatrice($nb1,$nb2, String $ope):Response{
        $temp = 0;
        if(is_numeric($nb1) && is_numeric($nb2)){
            switch ($ope){
                case "add":
                    $temp = $nb1 + $nb2;
                    return new Response("<p> L'addition de ".$nb1." et ".$nb2." est égale au résultat : ".$temp.".<p>");

                case "sous":
                    $temp = $nb1 - $nb2;
                    return new Response("<p> La soustraction de ".$nb1." et ".$nb2." est égale au résultat : ".$temp.".<p>");
                
                case "multi":
                    $temp = $nb1 * $nb2;
                    return new Response("<p> La multiplication de ".$nb1." par ".$nb2." est égale au résultat : ".$temp.".<p>");

                case "div":
                    if($nb2 !=0){
                        $temp = $nb1/$nb2;
                        return new Response("<p> La division de ".$nb1." par ".$nb2." est égale au résultat : ".$temp.".<p>");
                    }
                    return new Response("<p> La division par 0 est impossible.<p>");

                default:
                    return new Response("<p> Opérateur incorrect<p>");
            }
        }
        return new Response("<p>Veuillez entrer des valeurs correctes, les deux premières valeurs doivent être des nombres.<p>");    
    }
}