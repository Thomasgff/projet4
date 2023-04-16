<?php

namespace App\Controller;

use App\Entity\Logements;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class AtypikController extends AbstractController
{
    
    //Page d'accueil
    #[Route('/', name: 'homepage')]
    public function index(): Response
    {
        return $this->render('atypik/index.html.twig', [
            'controller_name' => 'AtypikController',
        ]);
    }



    //Controller affichant la fiche produit
    #[Route('/logements/{reference}', name: 'logement')]
    public function listing(Environment $twig, Logements $logement): Response
    {   
                     
        return new Response($twig->render('atypik/listing.html.twig', [
            'logement' => $logement,
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
