<?php

namespace App\Controller;

use App\Entity\Logements;
use App\Repository\LogementsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class AtypikController extends AbstractController
{
    public function __construct(
        private EntityManagerInterface $entityManager,
    ) {
    }
    
    //Page d'accueil
    #[Route('/', name: 'homepage')]
    public function index(Environment $twig,  LogementsRepository $logementsRepository): Response
    {
        return new Response($twig->render('atypik/index.html.twig', [
            'controller_name' => 'AtypikController',
            'logements' => $logementsRepository->findAll()
        ]));
    }

    //Page liste de résultats
    #[Route('/resultats', name: 'resultats')]
    public function show(Environment $twig, LogementsRepository $logementsRepository): Response
    {
        return new Response($twig->render('atypik/resultats.html.twig', [
            'controller_name' => 'AtypikController',
            'logements' => $logementsRepository->findAll(),
        ]));
    }

    //Controller affichant la fiche produit
    #[Route('/logements/{reference}', name: 'logement')]
    public function listing(Environment $twig, Logements $logements): Response
    {                  
        return new Response($twig->render('atypik/listing.html.twig', [
            'logement' => $logements,
        ]));
    }

    #[Route('/accueilbo', name: 'accueilbo')]
    public function bo(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        return $this->render('BO/accueilBO.html.twig', [
            'controller_name' => 'accueilbo',
        ]);
    }

}
