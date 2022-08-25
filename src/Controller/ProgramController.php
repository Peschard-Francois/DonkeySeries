<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/program', name: 'program_')]
class ProgramController extends AbstractController
{
    #[Route('/', name: 'program_index')]
    public function index(): Response
    {
        return $this->render('program/index.html.twig', [
            'website' => 'Donkey Séries',
        ]);
    }

    #[Route('/{id}', name: 'program_show', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function show(string $id): Response
    {
        return $this->render('program/show.html.twig', [
            'website' => 'Donkey Séries',
            'programId' => $id
        ]);
    }
}
