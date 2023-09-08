<?php

namespace App\Controller;

use App\Repository\ProfilRepository;
use App\Repository\PromotionRepository;
use App\Repository\YearOfPromotionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route('/default', name: 'app_default')]
    public function index(PromotionRepository $repository): Response
    {
        $promotions = $repository->findAll();


        return $this->render('default/index.html.twig', [
            "promotions" => $promotions,

        ]);
    }

    // #[Route('/promotion/{id}', name: 'show')]
    // public function promotion(int $id, PromotionRepository $r): Response
    // {
    //     $promotion = $r->find($id);
        
    //     return $this->render('promotion/index.html.twig', [
    //         'promotion' => $promotion,
            
    //     ]);
    // }

    #[Route('promotion/{id}', name: 'show')]
    public function profil(int $id, ProfilRepository $rep):Response
    {
        $profils = $rep->findAll();
        return $this->render('profil/detail.html.twig', [
            'profil' => $profils,
        ]);
    }

}
