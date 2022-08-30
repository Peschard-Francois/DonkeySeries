<?php

namespace App\Controller;


use App\Entity\Episode;
use App\Entity\Program;
use App\Entity\Season;
use App\Repository\EpisodeRepository;
use App\Repository\ProgramRepository;
use App\Repository\SeasonRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
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

    #[Route('/{id}', name: 'program_show', requirements: ['id' => '\d+'])]
    public function show(Program $program, SeasonRepository $seasonRepository): Response
    {
        $seasons = $seasonRepository->findBy([
            'program' => $program->getId()
        ]);

        return $this->render('program/show.html.twig', [
            'programById' => $program,
            'seasons' => $seasons
        ]);
    }

    #[Route('/{program_id}/seasons/{season_id} ', name: 'program_season_show', requirements: ['seasonId' => '\d+','programId' => '\d+'])]
    #[ParamConverter("program", class: "App\Entity\Program", options: ["mapping" => ["program_id" => "id"]])]
    #[ParamConverter("season", class: "App\Entity\Season", options: ["mapping" => ["season_id" => "id"]])]
    public function showSeason(Program $program, Season $season,EpisodeRepository $episodeRepository,): Response
    {

        $episodes = $episodeRepository->findBy([
            'season' => $season->getId()
        ],['number' => 'ASC']);
        return $this->render('program/season_show.html.twig', [
            'seasonById' => $season,
            'episodes' => $episodes,
            'programByIt' => $program

        ]);
    }
    #[Route('/program/{program_id}/season/{season_id}/episode/{episode_id}', name: 'program_episode_show')]
    #[ParamConverter("program", class: "App\Entity\Program", options: ["mapping" => ["program_id" => "id"]])]
    #[ParamConverter("season", class: "App\Entity\Season", options: ["mapping" => ["season_id" => "id"]])]
    #[ParamConverter("episode", class: "App\Entity\Episode", options: ["mapping" => ["episode_id" => "id"]])]
    public function showEpisode(Program $program, Season $season, Episode $episode)
    {
        return $this->render('program/episode_show.html.twig', [
            'program' => $program,
            'season' => $season,
            'episode' => $episode
        ]);
    }

}
