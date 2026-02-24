<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class GoodieController extends AbstractController
{
    #[Route('/goodie', name: 'app_goodie_admin')]
    public function index(): Response
    {
        return $this->render('back/goodie/index.html.twig', [
            'controller_name' => 'GoodieController',
        ]);
    }
}
