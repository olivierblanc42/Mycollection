<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class TypeController extends AbstractController
{
    #[Route('/admin/type', name: 'app_type_admin')]
    public function index(): Response
    {
        return $this->render('back/type/index.html.twig', [
            'controller_name' => 'TypeController',
        ]);
    }
}
