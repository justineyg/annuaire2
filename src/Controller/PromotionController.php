<?php

namespace App\Controller;

use App\Entity\Promotion;
use App\Entity\Profil;
use App\Repository\ProfilRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class PromotionController extends AbstractController
{
    #[Route('/promotion', name: 'app_promotion')]
    public function index(EntityManagerInterface $em): Response
    {
            $profils = $em->getRepository(Profil::class)->findAll();
            $promotions = $em->getRepository(Promotion::class)->findAll();

        return $this->render('promotion/index.html.twig', [
            'profils' => $profils,
            'promotions' => $promotions,
        ]);
    }

    #[Route('promotion/{id}', name: 'show')]
    public function profil(ProfilRepository $rep, Promotion $promotion):Response
    {
        
        // $profil = $rep->find($promotion);
       
         $profil = $rep->findAll();


        // $profils = $em->getRepository(ProfilRepository::class)->findAll();
        return $this->render('promotion/index.html.twig', [
            'profils' => $profil,
            'promotion' => $promotion,

            
            
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
