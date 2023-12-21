<?php

namespace App\Controller;

use App\Repository\ClubRepository;
use App\Repository\EquipeRepository;
use App\Repository\MatchVolleyRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PlanningMatchController extends AbstractController
{
    #[Route('/planning-matchs', name: 'app_planning_match')]
    public function index(Request $request, EntityManagerInterface $entityManager,
                          MatchVolleyRepository $matchVolleyRepository, EquipeRepository $equipeRepository, ClubRepository $clubRepository): Response
    {
        $listeMatchs = $matchVolleyRepository->findAll();
        $listeEquipes = $equipeRepository->findAll();
        $listeClub = $clubRepository->findAll();

        return $this->render('planning_match/index.html.twig', [
            'controller_name' => 'PlanningMatchController',
            'listeMatchs' => $listeMatchs,
            'listeEquipes' => $listeEquipes,
            'equipeRepository' => $equipeRepository
        ]);
    }
}
