<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class IllustratorController extends AbstractController
{
    #[Route('/admin/illustrator', name: 'app_illustrator_admin')]
    public function index(): Response
    {
        return $this->render('back/illustrator/index.html.twig', [
            'controller_name' => 'IllustratorController',
        ]);
    }
}
