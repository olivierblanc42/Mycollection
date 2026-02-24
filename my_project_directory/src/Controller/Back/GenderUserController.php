<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class GenderUserController extends AbstractController
{
    #[Route('/admin/gender/user', name: 'app_gender_user_admin')]
    public function index(): Response
    {
        return $this->render('back/gender_user/index.html.twig', [
            'controller_name' => 'GenderUserController',
        ]);
    }
}
