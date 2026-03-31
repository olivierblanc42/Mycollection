<?php

namespace App\Controller\Back;

use App\Form\CategoryType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;


#[Route('/admin/category')]
final class CategoryController extends AbstractController
{
    #[Route('/', name: 'app_category_admin')]
    public function index(
        Request $request
    ): Response
    {
        $categoryForm = $this->createForm(CategoryType::class, null, [
            'method' => 'GET',
        ]);


        return $this->render('back/category/index.html.twig', [
            'controller_name' => 'CategoryController',
            'categoryForm' => $categoryForm->createView(),
        ]);
    }
}
