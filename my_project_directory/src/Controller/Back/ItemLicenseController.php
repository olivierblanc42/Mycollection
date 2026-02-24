<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ItemLicenseController extends AbstractController
{
    #[Route('/item/license', name: 'app_item_license_admin')]
    public function index(): Response
    {
        return $this->render('back/item_license/index.html.twig', [
            'controller_name' => 'ItemLicenseController',
        ]);
    }
}
