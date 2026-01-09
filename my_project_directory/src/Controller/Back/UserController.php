<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/user')]

final class UserController extends AbstractController
{
    #[Route('/', name: 'app_admin_user')]
    public function index(): Response
    {
        return $this->render('user/back/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }
}
