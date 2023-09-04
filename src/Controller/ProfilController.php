<?php

namespace App\Controller;

use App\Entity\Profil;
use App\Repository\ProfilRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/profil')]
class ProfilController extends AbstractController
{
    // #[Route('/', name: 'app_profil_index', methods: ['GET'])]
    // public function index(ProfilRepository $profilRepository): Response
    // {
    //     return $this->render('product/index.html.twig', [
    //         'profils' => $profilRepository->findAll(),
    //     ]);
    // }

    #[Route('/{id}', name :'app_profil_show', methods: ['GET'])]
    public function get(EntityManagerInterface $em): Response
    {
        $profil = $em->getRepository(Profil::class)->findAll();
        return $this->render('profil/show.html.twig', [
            'profil' => $profil,
        ]);
    }
}
