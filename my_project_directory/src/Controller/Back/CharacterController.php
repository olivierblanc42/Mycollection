<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CharacterController extends AbstractController
{
    #[Route('/admin/character', name: 'app_character_admin')]
    public function index(): Response
    {
        return $this->render('back/character/index.html.twig', [
            'controller_name' => 'CharacterController',
        ]);
    }
}
