<?php

namespace App\Controller;

use App\Entity\MatchVolley;
use App\Form\MatchType;
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
        $listeClubs = $clubRepository->findAll();

        $matchVolley = new MatchVolley();
        $formMatch = $this->createForm(MatchType::class, null, ['equipes' => $listeEquipes, 'clubs' => $listeClubs]);
        $formMatch->handleRequest($request);

        var_dump($matchVolley);
        dump($matchVolley);
        dump($request->request->all());

        if($formMatch->isSubmitted() && $formMatch->isValid()){
            var_dump($matchVolley);
            dump($matchVolley);
            dump($request->request->all());

            $idEquipeVainqueur = (int) $formMatch->get('idEquipeVainqueur')->getData();
            $score = $formMatch->get('score')->getData();
            $duree = $formMatch->get('duree')->getData();
            $dateMatch = $formMatch->get('dateMatch')->getData();
            $idClub = (int) $formMatch->get('idClub')->getData();
            $idEquipe1 = (int) $formMatch->get('idEquipe1')->getData();
            $idEquipe2 = (int) $formMatch->get('idEquipe2')->getData();

            $matchVolley->setIdEquipeVainqueur($idEquipeVainqueur);
            $matchVolley->setScore($score);
            $matchVolley->setDuree($duree);
            $matchVolley->setDateMatch($dateMatch);
            $matchVolley->setClub($clubRepository->find($idClub));
            $matchVolley->addEquipe($equipeRepository->find($idEquipe1));
            $matchVolley->addEquipe($equipeRepository->find($idEquipe2));

            $entityManager->persist($matchVolley);
            $entityManager->flush();

//            return $this->redirectToRoute('app_planning_match', ['random' => uniqid()]);
            return $this->redirectToRoute('app_planning_match');
        }

        return $this->render('planning_match/index.html.twig', [
            'controller_name' => 'PlanningMatchController',
            'listeMatchs' => $listeMatchs,
            'formMatch' => $formMatch,
            'listeEquipes' => $listeEquipes,
            'listeClubs' => $listeClubs
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
