<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Twig2Controller extends AbstractController
{
    /**
     * @Route("/twig2", name="app_twig2")
     */
    public function index(): Response
    {
        return $this->render('twig2/index.html.twig', [
            'controller_name' => 'Twig2Controller',
        ]);
    }
}
