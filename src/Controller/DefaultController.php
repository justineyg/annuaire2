<?php

namespace App\Controller;

use App\Repository\PromotionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route('/default', name: 'app_default')]
    public function index(): Response
    {
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    #[Route('promotion/{id}', name: 'show')]
    public function promotion(int $id, PromotionRepository $repo): Response{
        $promotion = $repo->find($id);
        return $this->render('promotion/show..html.twig', [
            'promotion' => $promotion,
        ]);
    }
}
