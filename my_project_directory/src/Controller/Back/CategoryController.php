<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CategoryController extends AbstractController
{
    #[Route('/admin/category', name: 'app_category_admin')]
    public function index(): Response
    {
        return $this->render('back/category/index.html.twig', [
            'controller_name' => 'CategoryController',
        ]);
    }
}
