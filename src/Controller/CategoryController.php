<?php

namespace App\Controller;

use App\Entity\Category;
use App\Form\CategoryType;
use App\Repository\CategoryRepository;
use App\Repository\ProgramRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/category', name: 'category_')]
class CategoryController extends AbstractController
{
    #[Route('/', name: 'category_index')]
    public function index(CategoryRepository $categoryRepository): Response
    {
        $categorys = $categoryRepository->findAll();
        return $this->render('category/index.html.twig', [
            'categorys' => $categorys,
        ]);
    }

    #[Route("/new", name: "new")]
    public function new(Request $request, ManagerRegistry $doctrine) : Response
    {
        // Create a new Category Object
        $category = new Category();
        // Create the associated Form
        $form = $this->createForm(CategoryType::class, $category);
        // Render the form
        $form->handleRequest($request);
        // Was the form submitted ?
        if ($form->isSubmitted()) {
            // Deal with the submitted data
            // Get the Entity Manager
            $entityManager = $doctrine->getManager();
            // Persist Category Object
            $entityManager->persist($category);
            // Flush the persisted object
            $entityManager->flush();
            // Finally redirect to categories list
            return $this->redirectToRoute('category_category_index');
        }
        return $this->render('category/new.html.twig', [
            "form" => $form->createView(),
        ]);
    }

    #[Route('/{name}', name: 'category_show')]
    public function show(Category $category, CategoryRepository $categoryRepository ,ProgramRepository $programRepository): Response
    {
        if (!$category) {
            throw $this->createNotFoundException("La catégorie n'existe pas" );
        } else {
            $programByCategory = $programRepository->findBy([
                'category' => $category->getId()
            ]);
            if (!$programByCategory) {
                throw $this->createNotFoundException('Aucune série trouvée');
            } else {
                return $this->render('category/show.html.twig', [
                    'categoryOne' => $category->getName(),
                    'categoryWithPrograms' => $programByCategory
                ]);
            }
        }
    }


}
