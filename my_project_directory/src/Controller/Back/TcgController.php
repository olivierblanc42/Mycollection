<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class TcgController extends AbstractController
{
    #[Route('/admin/tcg', name: 'app_tcg_admin')]
    public function index(): Response
    {
        return $this->render('back/tcg/index.html.twig', [
            'controller_name' => 'TcgController',
        ]);
    }
}
