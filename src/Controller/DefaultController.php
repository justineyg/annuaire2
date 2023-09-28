<?php

namespace App\Controller;

use App\Repository\ProfilRepository;
use App\Repository\PromotionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route('/default', name: 'app_default')]
    public function index(PromotionRepository $repository, ProfilRepository $rep): Response
    {
        $promotions = $repository->findAll();
        

        return $this->render('default/index.html.twig', [
            "promotions" => $promotions,

        ]);
    }


}
