<?php

namespace App\Controller\Back;

use App\Form\TypeFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;


#[Route('/admin/type')]
final class TypeController extends AbstractController
{
    #[Route('/', name: 'app_type_admin')]
    public function index(
        Request $request

    ): Response
    {

     $typeForm = $this->createForm(TypeFormType::class,null,[
            'method' => 'GET',
     ]);
        $typeForm->handleRequest($request);

        return $this->render('back/type/index.html.twig', [
            'controller_name' => 'TypeController',
            'typeForm'=> $typeForm->createView(),
        ]);
    }
}
