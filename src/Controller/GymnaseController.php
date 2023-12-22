<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GymnaseController extends AbstractController
{
    #[Route('/gymnase', name: 'app_gymnase')]
    public function index(): Response
    {
        return $this->render('gymnase/index.html.twig', [
            'controller_name' => 'GymnaseController',
        ]);
    }
}
