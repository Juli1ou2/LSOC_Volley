<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EquipeController extends AbstractController
{
    #[Route('/senior_feminin', name: 'app_senior_feminin')]
    public function index(): Response
    {
        return $this->render('equipe/senior_feminin.html.twig', [
            'controller_name' => 'EquipeController',
        ]);
    }

    #[Route('/senior_masculin', name: 'app_senior_masculin')]
    public function index2(): Response
    {
        return $this->render('equipe/senior_masculin.html.twig', [
            'controller_name' => 'EquipeController',
        ]);
    }

    #[Route('/loisir', name: 'app_loisir')]
    public function index3(): Response
    {
        return $this->render('equipe/loisir.html.twig', [
            'controller_name' => 'EquipeController',
        ]);
    }
    #[Route('/m21masculin', name: 'app_m21masculin')]
    public function index4(): Response
    {
        return $this->render('equipe/m21masculin.html.twig', [
            'controller_name' => 'EquipeController',
        ]);
    }

    #[Route('/m18feminin', name: 'app_m18feminin')]
    public function index5(): Response
    {
        return $this->render('equipe/m18feminin.html.twig', [
            'controller_name' => 'EquipeController',
        ]);
    }

    #[Route('/m18masculin', name: 'app_m18masculin')]
    public function index6(): Response
    {
        return $this->render('equipe/m18masculin.html.twig', [
            'controller_name' => 'EquipeController',
        ]);
    }

    #[Route('/m15feminin', name: 'app_m15feminin')]
    public function index7(): Response
    {
        return $this->render('equipe/m15feminin.html.twig', [
            'controller_name' => 'EquipeController',
        ]);
    }
    #[Route('/m15masculin', name: 'app_m15masculin')]
    public function index8(): Response
    {
        return $this->render('equipe/m15masculin.html.twig', [
            'controller_name' => 'EquipeController',
        ]);
    }

    #[Route('/m13feminin', name: 'app_m13feminin')]
    public function index9(): Response
    {
        return $this->render('equipe/m13feminin.html.twig', [
            'controller_name' => 'EquipeController',
        ]);
    }

}
