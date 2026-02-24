<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

final class HomeController extends AbstractController
{
    #[Route('/admin', name: 'app_home_admin')]
    // #[IsGranted('ROLE_ADMIN')]
    public function index(): Response
    {
        return $this->render('back/home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}



