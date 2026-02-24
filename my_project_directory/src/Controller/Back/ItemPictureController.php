<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ItemPictureController extends AbstractController
{
    #[Route('/admin/item/picture', name: 'app_item_picture_admin')]
    public function index(): Response
    {
        return $this->render('back/item_picture/index.html.twig', [
            'controller_name' => 'ItemPictureController',
        ]);
    }
}
