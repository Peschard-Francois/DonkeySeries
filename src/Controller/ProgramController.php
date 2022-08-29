<?php

namespace App\Controller;

use App\Entity\Season;
use App\Repository\EpisodeRepository;
use App\Repository\ProgramRepository;
use App\Repository\SeasonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
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
            'programs' => $programs
        ]);
    }

    #[Route('/{programId}', name: 'program_show', requirements: ['id' => '\d+'])]
    public function show(int $programId, ProgramRepository $programRepository, SeasonRepository $seasonRepository): Response
    {
        $programById = $programRepository->find($programId);

        $seasons = $seasonRepository->findAll();

        return $this->render('program/show.html.twig', [
            'programById' => $programById,
            'seasons' => $seasons
        ]);
    }

    #[Route('/{programId}/seasons/{seasonId} ', name: 'program_season_show', requirements: ['seasonId' => '\d+','programId' => '\d+'])]
    public function showSeason(int $programId, int $seasonId , SeasonRepository $seasonRepository , EpisodeRepository $episodeRepository, ProgramRepository $programRepository)
    {
        $programByIt = $programRepository->find($programId);
        $seasonById = $seasonRepository->find($seasonId);
        $episodes = $episodeRepository->findBy([
            'season' => $seasonId
        ],['number' => 'ASC']);
        return $this->render('program/season_show.html.twig', [
            'seasonById' => $seasonById,
            'episodes' => $episodes,
            'programByIt' => $programByIt

        ]);
    }

}
