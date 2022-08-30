<?php

namespace App\Controller;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use App\Repository\ProgramRepository;
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
