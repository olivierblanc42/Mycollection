<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\TcgRepository;

final class TcgController extends AbstractController
{
    #[Route('/admin/tcg', name: 'app_tcg_admin', methods: ['GET'])]
    public function index(
    TcgRepository $tcgRepository

    ): Response
    {

        $tcgs = $tcgRepository->getQbAll()->getQuery()->getResult();


        return $this->render('back/tcg/index.html.twig', [
            'controller_name' => 'TcgController',
            'tcg' => $tcgs,
        ]);
    }
}
