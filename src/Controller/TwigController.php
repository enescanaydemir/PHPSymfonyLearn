<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TwigController extends AbstractController
{
    /**
     * @Route("/twig", name="app_twig")
     */
    public function index(): Response
    {
        $arrData = [
            "data1"=>1,
            "data2"=>2,
            "data3"=>3,
            "data4"=>4,
            "data5"=>5,
        ];
        return $this->render('twig/index.html.twig', [
            'arrData' => $arrData,
            'isActive' => false
        ]);
    }
}
