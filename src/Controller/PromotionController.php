<?php

namespace App\Controller;

use App\Repository\ProfilRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class PromotionController extends AbstractController
{
    #[Route('/promotion', name: 'app_promotion')]
    public function index(ProfilRepository $repository): Response
    {

        return $this->render('promotion/index.html.twig', [
            'profils' => $repository->findAll(),
        ]);
    }

    // #[Route('/profil/{id}', name :'app_profil_show', methods: ['GET'])]
    // public function get(EntityManagerInterface $em): Response
    // {
    //     $profil = $em->getRepository(Profil::class)->findAll();
    //     return $this->render('profil/show.html.twig', [
    //         'profil' => $profil,
    //     ]);
    // }
  
}
