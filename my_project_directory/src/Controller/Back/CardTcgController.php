<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CardTcgController extends AbstractController
{
    #[Route('/admin/card/tcg', name: 'app_card_tcg_admin')]
    public function index(): Response
    {
        return $this->render('back/card_tcg/index.html.twig', [
            'controller_name' => 'CardTcgController',
        ]);
    }
}
