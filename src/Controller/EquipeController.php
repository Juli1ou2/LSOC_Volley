<?php

namespace App\Controller;

use App\Entity\Joueur;
use App\Form\JoueurType;
use App\Repository\EquipeRepository;
use App\Repository\JoueurRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EquipeController extends AbstractController
{
    #[Route('/senior_feminin', name: 'app_senior_feminin')]
    public function index( JoueurRepository $joueurRepository,
                           EquipeRepository $equipeRepository,
                           Request $request,
                           EntityManagerInterface $entityManager): Response
    {
        $joueur = new Joueur();
        $form = $this->createForm(JoueurType::class, $joueur);
        $form->handleRequest($request);

        $equipes = $equipeRepository->findAll();
        $joueurs = $joueurRepository->findAll();

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($joueur);
            $entityManager->flush();
        }
        return $this->render('equipe/senior_feminin.html.twig', [
            'controller_name' => 'EquipeController',
            'equipes' => $equipes,
            'joueurs' => $joueurs,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/senior_masculin', name: 'app_senior_masculin')]
    public function index2( JoueurRepository $joueurRepository,
                            EquipeRepository $equipeRepository,
                            Request $request,
                            EntityManagerInterface $entityManager): Response
    {
        $joueur = new Joueur();
        $form = $this->createForm(JoueurType::class, $joueur);
        $form->handleRequest($request);

        $equipes = $equipeRepository->findAll();
        $joueurs = $joueurRepository->findAll();

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($joueur);
            $entityManager->flush();
        }
        return $this->render('equipe/senior_masculin.html.twig', [
            'controller_name' => 'EquipeController',
            'equipes' => $equipes,
            'joueurs' => $joueurs,
            'form' => $form->createView(),

        ]);
    }

    #[Route('/loisir', name: 'app_loisir')]
    public function index3( JoueurRepository $joueurRepository,
                            EquipeRepository $equipeRepository,
                            Request $request,
                            EntityManagerInterface $entityManager): Response
    {
        $joueur = new Joueur();
        $form = $this->createForm(JoueurType::class, $joueur);
        $form->handleRequest($request);

        $equipes = $equipeRepository->findAll();
        $joueurs = $joueurRepository->findAll();

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($joueur);
            $entityManager->flush();
        }
        return $this->render('equipe/loisir.html.twig', [
            'controller_name' => 'EquipeController',
            'equipes' => $equipes,
            'joueurs' => $joueurs,
            'form' => $form->createView(),

        ]);
    }
    #[Route('/m21masculin', name: 'app_m21masculin')]
    public function index4( JoueurRepository $joueurRepository,
                            EquipeRepository $equipeRepository,
                            Request $request,
                            EntityManagerInterface $entityManager): Response
    {
        $joueur = new Joueur();
        $form = $this->createForm(JoueurType::class, $joueur);
        $form->handleRequest($request);

        $equipes = $equipeRepository->findAll();
        $joueurs = $joueurRepository->findAll();

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($joueur);
            $entityManager->flush();
        }
        return $this->render('equipe/m21masculin.html.twig', [
            'controller_name' => 'EquipeController',
            'equipes' => $equipes,
            'joueurs' => $joueurs,
            'form' => $form->createView(),

        ]);
    }

    #[Route('/m18feminin', name: 'app_m18feminin')]
    public function index5( JoueurRepository $joueurRepository,
                            EquipeRepository $equipeRepository,
                            Request $request,
                            EntityManagerInterface $entityManager): Response
    {
        $joueur = new Joueur();
        $form = $this->createForm(JoueurType::class, $joueur);
        $form->handleRequest($request);

        $equipes = $equipeRepository->findAll();
        $joueurs = $joueurRepository->findAll();

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($joueur);
            $entityManager->flush();
        }
        return $this->render('equipe/m18feminin.html.twig', [
            'controller_name' => 'EquipeController',
            'equipes' => $equipes,
            'joueurs' => $joueurs,
            'form' => $form->createView(),

        ]);
    }

    #[Route('/m18masculin', name: 'app_m18masculin')]
    public function index6( JoueurRepository $joueurRepository,
                            EquipeRepository $equipeRepository,
                            Request $request,
                            EntityManagerInterface $entityManager): Response
    {
        $joueur = new Joueur();
        $form = $this->createForm(JoueurType::class, $joueur);
        $form->handleRequest($request);

        $equipes = $equipeRepository->findAll();
        $joueurs = $joueurRepository->findAll();

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($joueur);
            $entityManager->flush();
        }
        return $this->render('equipe/m18masculin.html.twig', [
            'controller_name' => 'EquipeController',
            'equipes' => $equipes,
            'joueurs' => $joueurs,
            'form' => $form->createView(),

        ]);
    }

    #[Route('/m15feminin', name: 'app_m15feminin')]
    public function index7( JoueurRepository $joueurRepository,
                            EquipeRepository $equipeRepository,
                            Request $request,
                            EntityManagerInterface $entityManager): Response
    {
        $joueur = new Joueur();
        $form = $this->createForm(JoueurType::class, $joueur);
        $form->handleRequest($request);

        $equipes = $equipeRepository->findAll();
        $joueurs = $joueurRepository->findAll();

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($joueur);
            $entityManager->flush();
        }
        return $this->render('equipe/m15feminin.html.twig', [
            'controller_name' => 'EquipeController',
            'equipes' => $equipes,
            'joueurs' => $joueurs,
            'form' => $form->createView(),

        ]);
    }
    #[Route('/m15masculin', name: 'app_m15masculin')]
    public function index8( JoueurRepository $joueurRepository,
                            EquipeRepository $equipeRepository,
                            Request $request,
                            EntityManagerInterface $entityManager): Response
    {
        $joueur = new Joueur();
        $form = $this->createForm(JoueurType::class, $joueur);
        $form->handleRequest($request);

        $equipes = $equipeRepository->findAll();
        $joueurs = $joueurRepository->findAll();

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($joueur);
            $entityManager->flush();
        }
        return $this->render('equipe/m15masculin.html.twig', [
            'controller_name' => 'EquipeController',
            'equipes' => $equipes,
            'joueurs' => $joueurs,
            'form' => $form->createView(),

        ]);
    }

    #[Route('/m13feminin', name: 'app_m13feminin')]
    public function index9(
        JoueurRepository $joueurRepository,
        EquipeRepository $equipeRepository,
        Request $request,
        EntityManagerInterface $entityManager
    ): Response {
        $joueur = new Joueur();
        $form = $this->createForm(JoueurType::class, $joueur);
        $form->handleRequest($request);

        $equipes = $equipeRepository->findAll();
        $joueurs = $joueurRepository->findAll();

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($joueur);
            $entityManager->flush();
        }

        return $this->render('equipe/m13feminin.html.twig', [
            'controller_name' => 'EquipeController',
            'equipes' => $equipes,
            'joueurs' => $joueurs,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/joueur/delete/{id}', name: 'app_joueur_delete',)]
    public function delete($id, EntityManagerInterface $entityManager, JoueurRepository $joueurRepository): Response
    {
        $joueur = $joueurRepository->find($id);



        $entityManager->remove($joueur);
        $entityManager->flush();

        return $this->redirectToRoute('app_m13feminin');
    }

}
