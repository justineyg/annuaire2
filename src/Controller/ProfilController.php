<?php

namespace App\Controller;

use App\Entity\Profil;
use App\Entity\Promotion;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ProfilController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;

          ;
    }

    

        #[Route('/profil/{slug}', name: 'app_profil_detail', methods: ['GET'])]
    public function index($slug, Promotion $promotion, Profil $profil): Response
    {
        $profil = $this->entityManager->getRepository(Profil::class)->findOneBySlug($slug);

        if(!$profil){
            return $this->redirectToRoute('promotion');
        }

        return $this->render('profil/detail.html.twig', [
            'profil' => $profil,
            'promotion' => $promotion,

        ]);
    }

    // #[Route('/', name: 'app_profil_detail', methods: ['GET'])]
    // public function index(ProfilRepository $profilRepository): Response
    // {
    //     return $this->render('profil/detail.html.twig', [
    //         'profils' => $profilRepository->findAll(),
           
    //     ]);
    // }

}
