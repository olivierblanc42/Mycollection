<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\NetworkRepository;



final class NetworkController extends AbstractController
{
    #[Route('/admin/network', name: 'app_network_admin', methods: ['GET'])]
    public function index(
        NetworkRepository $networkRepository

    ): Response
    {
           
        $networks = $networkRepository->getQbAll()->getQuery()->getResult();

        return $this->render('back/network/index.html.twig', [
            'controller_name' => 'NetworkController',
            'networks' => $networks
        ]);
    }
}
