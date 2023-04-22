<?php

namespace App\Controller;

use App\Entity\Logements;
use App\Entity\Reservations;
use App\Form\ReservationFormType;
use App\Repository\CoupsdecoeurRepository;
use App\Repository\LogementsRepository;
use App\Repository\ReservationsRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
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

    //Controller affichant les conditions générales d'usage
    #[Route('/cgu', name: 'cgu')]
    public function cgu(): Response
    {                  
        return $this->render('atypik/cgu.html.twig', [
           'controller_name' => 'AtypikController'
        ]);
    }
    
    //Controller gérant la prise de réservation
    #[Route('/logements/reservation/{reference}', name: 'reservation')]
    public function reservation(Request $request, EntityManagerInterface $entityManager, Logements $logement): Response
    {     
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $booking = new Reservations(); 
        $form = $this->createForm(ReservationFormType::class,$booking); 
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($booking);
            $entityManager->flush();

            return $this->redirectToRoute('confirmation');
        }
        
        
        return $this->render('atypik/vel.html.twig', [
            'logement' => $logement,
            'reservationForm' => $form->createView()
        ]);
    }    

    //Confirmation de résa
    #[Route('/confirmation', name: 'confirmation')]
    public function conf(): Response
    {     
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');        
        
        return $this->render('atypik/conf.html.twig', [
        ]);
    }    

    //Réservations de l'user
    #[Route('/mesreservations', name: 'mesreservations')]
    public function resas(Security $security, ReservationsRepository $reservationsRepository): Response
    {     
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');   
        
        $user = $security->getUser();
        $email = $user->getEmail();

        $reservations = $reservationsRepository->findBy(['email' => $email]);
        
        return $this->render('atypik/reservations.html.twig', [
            'email' => $email,
            'reservations' => $reservations
        ]);
    }    

    #[Route('/accueilbo', name: 'accueilbo')]
    public function bo(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        return $this->render('BO/accueilBO.html.twig', [
            'controller_name' => 'AtypikController',
        ]);
    }


    #[Route('/accueilbo/users', name: 'gestionUsers')]
    public function gestionUsers(UserRepository $userRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        return $this->render('BO/gestionUsers.html.twig', [
            'users' => $userRepository->findAll(),
            'controller_name' => 'AtypikController'
        ]);
    }

    #[Route('/accueilbo/gestionhomepage', name: 'affichageHome')]
    public function gestionHome(LogementsRepository $logementsRepository, CoupsdecoeurRepository $coupsdecoeurRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        return $this->render('BO/gestionHome.html.twig', [
            'logements' => $logementsRepository->findAll(),
            'coupsdecoeur' => $coupsdecoeurRepository->findAll(),
            'controller_name' => 'AtypikController'
        ]);
    }




}
