<?php

namespace App\Controller\Frontoffice;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="app_frontoffice_home")
     */
    public function index(): Response
    {
        return $this->render('frontoffice/home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
