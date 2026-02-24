<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ExpansionController extends AbstractController
{
    #[Route('/admin/expansion', name: 'app_expansion_admin')]
    public function index(): Response
    {
        return $this->render('back/expansion/index.html.twig', [
            'controller_name' => 'ExpansionController',
        ]);
    }
}
