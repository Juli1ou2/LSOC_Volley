<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClubController extends AbstractController
{
    #[Route('/mot_du_president', name: 'app_mot_du_president')]
    public function index(): Response
    {
        return $this->render('club/mot_president.html.twig', [
            'controller_name' => 'ClubController',
        ]);
    }
    #[Route('/historique', name: 'app_historique')]
    public function index2(): Response
    {
        return $this->render('club/historique.html.twig', [
            'controller_name' => 'ClubController',
        ]);
    }
}
