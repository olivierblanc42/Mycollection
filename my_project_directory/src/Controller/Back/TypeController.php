<?php

namespace App\Controller\Back;

use App\Entity\Type;
use App\Form\TypeFormType;
use App\Repository\TypeRepository;
use Doctrine\DBAL\Exception\ForeignKeyConstraintViolationException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use PhpParser\Node\Stmt\TryCatch;

#[Route('/admin/type')]
final class TypeController extends AbstractController
{

    public function __construct(
        private EntityManagerInterface $em
    ) {}

    /**
     * Displays the list of all types.
     *
     * This method:
     * - Retrieves all types from the database.
     * - Renders the index page with the list of types.
     *
     * @param TypeRepository $typeRepository Repository used to manage Type entities.
     *
     * @return Response The rendered page containing the list of types.
     */
    #[Route('/', name: 'app_type_admin')]
    public function index(
        TypeRepository $typeRepository
    ): Response {

        $type = $typeRepository->getQbAll()->getQuery()->getResult();

        return $this->render('back/type/index.html.twig', [
            'type' => $type,
        ]);
    }


    /**
     * Creates a new Type.
     *
     * This method:
     * - Displays the creation form on GET requests.
     * - Processes the submitted form data.
     * - Checks whether the form has been submitted and is valid.
     * - Persists the new Type entity to the database.
     * - Redirects the user to the types list after successful creation.
     *
     * @param Request $request The HTTP request containing the form data.
     *
     * @return Response The rendered form or a redirection response.
     */
    #[Route('/new', name: 'app_type_admin_new', methods: ['GET', 'POST'])]
    public function new(Request $request)

    {
        $type = new Type();

        $form = $this->createForm(TypeFormType::class, $type);

        $form->handleRequest($request);

        if ($form->isSubmitted() &&  $form->isValid()) {

            $this->em->persist($type);
            $this->em->flush();
            return $this->redirectToRoute('app_type_admin', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('back/type/new.html.twig', [
            'controller_name' => 'TypeController',
            'typeForm' => $form->createView(),
        ]);
    }


    /**
     * Displays the details of a Type.
     *
     * This method:
     * - Retrieves a Type entity by its ID (via route parameter).
     * - Displays the details of the selected Type.
     *
     * @param Type $type The Type entity resolved from the route parameter.
     *
     * @return Response The rendered detail page.
     */
    #[Route('/{id}', name: 'app_type_admin_show', methods: ['GET'])]
    public function show(Type $type): Response
    {
        return $this->render(
            'back/type/show.html.twig',
            ['type' => $type]
        );
    }

    /**
     * 
     *  Update a Type.
     * 
     * This method:
     * - Displays the Edit form on GET requests.
     * - Processes the data from the submitted form and displays it.
     * - Checks whether the form has been submitted and is valid.
     * - Updates the existing Type entity in the database.
     * - Redirects the user to the types list after successful update.
     * 
     * @param Type $type The Type entity resolved from the route parameter.
     * @param Request $request HTTP request containing the form data.
     * 
     * @return Response The rendered form or a redirection response.
     */
    #[Route('/{id}/edit', name: 'app_type_admin_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Type $type): Response
    {

        $form = $this->createForm(TypeFormType::class, $type);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->persist($type);
            $this->em->flush();
            return $this->redirectToRoute('app_type_admin', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('back/type/edit.html.twig', [
            'controller_name' => 'TypeController',
            'typeForm' => $form,
            'type' => $type

        ]);
    }




    /**
     * 
     *  Delete a Type.
     * 
     * This method:
     * - Validates the CSRF token to ensure the request is legitimate.
     * - Deletes the Type entity if the token is valid.
     * - Uses a POST request to perform the deletion.
     * 
     * 
     * @param Type $type The Type entity resolved from the route parameter.
     * @param Request $request HTTP request containing the form data.
     * @param TypeRepository $typeRepository Repository used to manage Type entities.
     * 
     * @return Response Redirection response.
     */
    #[Route('/{id}', name: 'app_type_admin_delete', methods: ['POST'])]
    public function remove(Request $request, TypeRepository $typeRepository, Type $type): Response
    {

        try {
            if ($this->isCsrfTokenValid('delete' . $type->getId(), $request->request->get('_token'))) {
                $this->em->remove($type);
                $this->em->flush();
            }
        } catch (ForeignKeyConstraintViolationException $e) {
            $this->addFlash(
                'error',
                'Impossible de supprimer ce type car il est utilisé par un ou plusieurs éléments.'
            );
  
        }
        return $this->redirectToRoute('app_type_admin', [], Response::HTTP_SEE_OTHER);
    }
}





