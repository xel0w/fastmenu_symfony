<?php

namespace App\Controller\Backoffice;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    /**
     * @Route("/backoffice/dashboard", name="app_backoffice_dashboard")
     */
    public function index(): Response
    {
        return $this->render('backoffice/dashboard/index.html.twig', [
            'controller_name' => 'DashboardController',
        ]);
    }
}
