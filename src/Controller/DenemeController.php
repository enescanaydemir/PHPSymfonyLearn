<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class DenemeController extends AbstractController
{
    /**
     * @Route("/deneme", name="deneme_show")
     */
    public function index(Request $request): Response
    {
        $server = $request->server->get("REMOTE_ADDR");

        return new Response($server);

        dump($server);
        dump($request);
        exit();
    }
}
