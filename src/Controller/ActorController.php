<?php

namespace App\Controller;

use App\Entity\Program;
use App\Repository\ActorRepository;
use App\Repository\ProgramRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/actor', name: 'app_actor')]
class ActorController extends AbstractController
{
    #[Route('/', name: '_index')]
    public function index(ActorRepository $actorRepository): Response
    {
        $actors = $actorRepository->findAll();
        return $this->render('actor/index.html.twig', [
            'actors' => $actors,
        ]);
    }

    #[Route('/{id}', name: '_show')]
    public function show(int $id,ActorRepository $actorRepository , ProgramRepository $programRepository): Response
    {
        $actor = $actorRepository->find($id);
        $programs = $actor->getPrograms();



        return $this->render('actor/show.html.twig', [
            'actor' => $actor,
            'programs' => $programs
        ]);
    }
}
