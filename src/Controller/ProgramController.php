<?php

namespace App\Controller;

use App\Repository\ProgramRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/program', name: 'program_')]
class ProgramController extends AbstractController
{
    #[Route('/', name: 'program_index')]
    public function index(ProgramRepository $programRepository): Response
    {

        $programs = $programRepository->findAll();
        if (!$programs) {
            throw $this->createNotFoundException(
                'No program in program\'s table.'
            );
        }
        return $this->render('program/index.html.twig', [
            'website' => 'Donkey Séries',
            'programs' => $programs
        ]);
    }

    #[Route('/{id}', name: 'program_show', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function show(int $id,ProgramRepository $programRepository): Response
    {
        $programById = $programRepository->find($id);

        return $this->render('program/show.html.twig', [
            'programById' => $programById
        ]);
    }
}
