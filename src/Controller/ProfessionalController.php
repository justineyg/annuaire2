<?php

namespace App\Controller;

use App\Entity\Promotion;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfessionalController extends AbstractController
{

    #[Route('/professional', name: 'app_professional')]
    public function index(EntityManagerInterface $em): Response
    {
        $promotionRepository = $em->getRepository(Promotion::class);

        $promotions = $promotionRepository->findAll();


        return $this->render('professional/index.html.twig', [
            'controller_name' => 'ProfessionalController',
            'promotions' => $promotions,
        ]);
    }
    

}
