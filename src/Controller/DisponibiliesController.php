<?php

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Logements;

class DisponibilitieController extends AbstractController
{
    /**
     * @Route("/disponibilities", name="disponibilities")
     */
    public function index(): JsonResponse
    {
        // récupérer les dates disponibles à partir de la base de données
        $datesDisponibles = $this->getDoctrine()
            ->getRepository(Logements::class)
            ->findDatesDisponibles();

        // renvoyer les dates sous forme de réponse JSON
        return new JsonResponse($datesDisponibles);
    }
}
