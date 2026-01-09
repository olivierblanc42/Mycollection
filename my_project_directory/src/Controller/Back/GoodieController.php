<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/goodies')]
final class GoodieController extends AbstractController
{
    #[Route('/', name: 'app_admin_goodie')]
    public function index(): Response
    {
        return $this->render('back/goodie/index.html.twig', [
            'controller_name' => 'GoodieController',
        ]);
    }
}
