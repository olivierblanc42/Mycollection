<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class NetworkController extends AbstractController
{
    #[Route('/admin/network', name: 'app_network_admin')]
    public function index(): Response
    {
        return $this->render('back/network/index.html.twig', [
            'controller_name' => 'NetworkController',
        ]);
    }
}
