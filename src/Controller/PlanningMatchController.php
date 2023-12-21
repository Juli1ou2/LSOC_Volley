<?php

namespace App\Controller;

use App\Entity\Eleve;
use App\Entity\MatchVolley;
use App\Form\EleveType;
use App\Form\MatchVolleyType;
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

        $matchVolley = new MatchVolley();
        $formMatchVolley = $this->createForm(MatchVolleyType::class, $matchVolley);
        $formMatchVolley->handleRequest($request);

        if($formMatchVolley->isSubmitted() && $formMatchVolley->isValid()){
//            $equipe1 = $formMatchVolley->get('equipe1')->getData();
//            $equipe2 = $formMatchVolley->get('equipe2')->getData();
//            $matchVolley->addEquipe($equipe1);
//            $matchVolley->addEquipe($equipe2);
            $equipesSelectionnees = $formMatchVolley->get('equipes')->getData();

            // Parcourir la collection d'équipes
            foreach ($equipesSelectionnees as $equipe) {
                $matchVolley->addEquipe($equipe);
            }

            $entityManager->persist($matchVolley); //précharger les données avant de les envoyer
            $entityManager->flush($matchVolley); //envoi des données à la BDD

            return $this->redirectToRoute('app_planning_match', ['random' => uniqid()]);
        }

        return $this->render('planning_match/index.html.twig', [
            'controller_name' => 'PlanningMatchController',
            'listeMatchs' => $listeMatchs,
            'formMatchVolley' => $formMatchVolley,
            'listeEquipes' => $listeEquipes
        ]);
    }

    #[Route('/match/delete/{id}', name:'app_match_volley_delete')]
    public function delete($id, EntityManagerInterface$entityManager,
                           MatchVolleyRepository $matchVolleyRepository) :Response{
        $matchVolley = $matchVolleyRepository->find(["id" => $id]);
        $entityManager->remove($matchVolley);
        $entityManager->flush();

        $this->redirectToRoute('app_planning_match');

        return $this->redirectToRoute('app_planning_match');
    }
}
