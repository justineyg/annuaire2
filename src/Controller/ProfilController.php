<?php

namespace App\Controller;

use App\Entity\Profil;
use App\Entity\Promotion;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ProfilController extends AbstractController
{
    

    // #[Route('/profil/{slug}', name: 'app_profil_detail', methods: ['GET'])]
    // public function index(Profil $profil): Response
    // {
       
    //     return $this->render('profil/detail.html.twig', [
    //         'profil' => $profil,

    //     ]);
    // }


    #[Route('/profil/id', name: 'app_profil_detail', methods: ['GET'])]
    public function index($id, EntityManagerInterface $em): Response
    {
       $profil = $em->getRepository(Profil::class)->findOneById($id);
       if($profil == null){
        return new JsonResponse('Profil introuvable', 404);
       }
       return new JsonResponse($profil, 200);
    }

}

