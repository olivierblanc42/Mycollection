<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class GoodieController extends AbstractController
{
    #[Route('/goodies', name: 'app_goodie')]
    public function index(): Response
    {
        return $this->render('front/goodie/index.html.twig', [
            'controller_name' => 'GoodieController',
        ]);
    }
}
