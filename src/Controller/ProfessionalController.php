<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfessionalController extends AbstractController
{
    #[Route('/professional', name: 'app_professional')]
    public function searchAction(Request $request)
    {

        $searchForm = $this->createFormBuilder()
            ->add('search', TextType::class)
            ->add('search', SubmitType::class, ['label' => 'Rechercher'])
            ->getForm();
            
        $searchForm->handleRequest($request);

        if($searchForm->isSubmitted() && $searchForm->isValid()) {
            $data = $searchForm->getData();
            $searchQuery = $data['search'];

            $entityManager = $this->getDoctrine()->getManager;
            $results = $entityManager->getRepository(Profil::class)->findBySearchQuery($searchQuery);

            return $this->render('professional/index.html.twig', ['results' => $results]);
        }
    }
    
    // #[Route('/professional', name: 'app_professional')]
    // public function index(): Response
    // {

    //     return $this->render('professional/index.html.twig', [
    //         'controller_name' => 'ProfessionalController',
    //     ]);
    // }
    

}
