<?php

namespace App\Controller;

use App\Entity\Evenement;
use App\Form\EvenementType;
use App\Repository\EvenementRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PageEvenementController extends AbstractController
{
    #[Route('/page/evenement', name: 'app_page_evenement')]
    public function index(Request $request, EntityManagerInterface $entityManager,
                          EvenementRepository $evenementRepository): Response
    {
        $listeEvenements = $evenementRepository->findAll();

        $evenement = new Evenement();
        $formEvenement = $this->createForm(EvenementType::class, $evenement);
        $formEvenement->handleRequest($request);

        if($formEvenement->isSubmitted() && $formEvenement->isValid()){
            $entityManager->persist($evenement);
            $entityManager->flush();

//            return $this->redirectToRoute('app_planning_match', ['random' => uniqid()]);
            return $this->redirectToRoute('app_page_evenement');
        }

        return $this->render('page_evenement/index.html.twig', [
            'controller_name' => 'PageEvenementController',
            'listeEvenements' => $listeEvenements,
            'formEvenement' => $formEvenement
        ]);
    }

    #[Route('/evenement/delete/{id}', name:'app_evenement_delete')]
    public function delete($id, EntityManagerInterface$entityManager,
                           EvenementRepository $evenementRepository) :Response{
        $evenement = $evenementRepository->find(["id" => $id]);
        $entityManager->remove($evenement);
        $entityManager->flush();

        $this->redirectToRoute('app_page_evenement');

        return $this->redirectToRoute('app_page_evenement');
    }

    #[Route('/evenement/update/{id}', name: 'app_evenement_update')]
    public function update($id, Request $request, EntityManagerInterface $entityManager, EvenementRepository $evenementRepository): Response
    {
        $evenement = $evenementRepository->find($id);

        // Créer le formulaire avec les données de l'événement existant
        $formEvenement = $this->createForm(EvenementType::class, $evenement);
        $formEvenement->handleRequest($request);

        if ($formEvenement->isSubmitted() && $formEvenement->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_page_evenement');
        }

        return $this->render('page_evenement/update.html.twig', [
            'controller_name' => 'PageEvenementController',
            'formEvenement' => $formEvenement->createView(),
        ]);
    }

    #[Route('/evenement/infos/{id}', name: 'app_evenement_infos')]
    public function infos($id, Request $request, EntityManagerInterface $entityManager, EvenementRepository $evenementRepository): Response
    {
        $evenement = $evenementRepository->find($id);

        return $this->render('page_evenement/infos.html.twig', [
            'controller_name' => 'PageEvenementController',
            'evenement' => $evenement
        ]);
    }
}
