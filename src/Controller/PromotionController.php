<?php

namespace App\Controller;

use App\Entity\Promotion;
use App\Entity\Profil;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class PromotionController extends AbstractController
{
    #[Route('/promotion', name: 'app_promotion')]
    public function default(EntityManagerInterface $em): Response
    {
           
            $promotions = $em->getRepository(Promotion::class)->findAll();

        return $this->render('promotion/default.html.twig', [
            'promotions' => $promotions
        ]);
    }

    // #[Route('promotion/{id}', name: 'show', methods:['GET'])]
    // public function get($id, EntityManagerInterface $em):Response
    // {
        
    //     // $profil = $rep->find($promotion);
       
    //     //  $profil = $rep->findAll();
    //     $promotion = $em->getRepository(Promotion::class)->findOneById($id);

    //      $profil = $em->getRepository(Profil::class)->findById($id);
    //     // $profils = $em->getRepository(ProfilRepository::class)->findAll();
    //             return $this->render('promotion/index.html.twig', [
    //         'profils' => $profil,
    //         'promotion' => $promotion,
    //     ]);
    
    // }

    #[Route('promotion/{id}', name: 'show', methods:['GET'])]
    public function index(Promotion $promotion):Response
    {
        
        // $profil = $rep->find($promotion);
       
        //  $profil = $rep->findAll();
    

        
        // $profils = $em->getRepository(ProfilRepository::class)->findAll();
                return $this->render('promotion/index.html.twig', [
            'promotion' => $promotion
            // 'profil' => $profil
        ]);
    
    }

    // #[Route('promotion/{id}', name: 'show', methods:['GET'])]
    // public function profil($id, EntityManagerInterface $em):Response
    // {
        
    //     // $profil = $rep->find($promotion);
       
    //     //  $profil = $rep->findAll();
    //     $promotion = $em->getRepository(Promotion::class)->findoneById($id);
        
    //      $profil = $em->getRepository(Profil::class)->findById($id);
    //     // $profils = $em->getRepository(ProfilRepository::class)->findAll();
    //     return $this->render('promotion/index.html.twig', [
    //         'profils' => $profils,
    //         'promotion' => $promotion,
    //     ]);
    // }
  
}
