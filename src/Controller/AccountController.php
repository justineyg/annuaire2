<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccountController extends AbstractController
{
    #[Route('/my-account', name: 'app_account')]
    public function index()
    {
        return $this->render('account/index.html.twig', [
            

        ]);
    }

    // #[Route('/my-account', name: 'app_account')]
    // public function index(User $user)
    // {
    //     return $this->render('account/index.html.twig', [
    //         'user' => $user,

    //     ]);
    // }
}
