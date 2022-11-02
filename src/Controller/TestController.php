<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class TestController extends AbstractController
{
    /**
     * @Route("/test", name="test_show")
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
