<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/tcgCard')]

final class TcgCardController extends AbstractController
{
    #[Route('/', name: 'app_admin_tcg_card')]
    public function index(): Response
    {
        return $this->render('back/tcg_card/index.html.twig', [
            'controller_name' => 'TcgCardController',
        ]);
    }
}
