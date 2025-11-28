<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class TcgCardController extends AbstractController
{
    #[Route('/tcg/card', name: 'app_tcg_card')]
    public function index(): Response
    {
        return $this->render('front/tcg_card/index.html.twig', [
            'controller_name' => 'TcgCardController',
        ]);
    }
}
