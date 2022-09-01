<?php

namespace App\DataFixtures;

use App\Entity\Season;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class SeasonFixtures extends Fixture implements DependentFixtureInterface
{
    public const SEASON_THE_BIG_BANG_THEORY = 'SEASON_THE_BIG_BANG_THEORY';
    public const SEASON_THE_BIG_BANG_THEORY_2 = 'SEASON_THE_BIG_BANG_THEORY_2';
    public const SEASON_STRANGER_THINGS = 'SEASON_STRANGER_THINGS';
    public const SEASON_STRANGER_THINGS_2 = 'SEASON_STRANGER_THINGS_2';
    public const SEASON_THE_BOYS = 'SEASON_THE_BOYS';
    public const SEASON_THE_BOYS_2 = 'SEASON_THE_BOYS_2';
    public const SEASON_GAME_OF_THRONES = 'SEASON_GAME_OF_THRONES';
    public const SEASON_GAME_OF_THRONES_2 = 'SEASON_GAME_OF_THRONES_2';
    public const SEASON_OBI_WAN_KENOBI = 'SEASON_OBI_WAN_KENOBI';


    public function load(ObjectManager $manager): void
    {

        $season = new Season();
        $season->setProgram($this->getReference(ProgramFixtures::PROGRAM_THE_BIG_BANG_THEORY));
        $season->setNumber(1);
        $season->setYear(2007);
        $season->setDescription("Season 1 The Big Bang Theory");
        $this->addReference(self::SEASON_THE_BIG_BANG_THEORY,$season);
        $manager->persist($season);

        $season = new Season();
        $season->setProgram($this->getReference(ProgramFixtures::PROGRAM_THE_BIG_BANG_THEORY));
        $season->setNumber(2);
        $season->setYear(2008);
        $season->setDescription("Season 2 The Big Bang Theory");
        $this->addReference(self::SEASON_THE_BIG_BANG_THEORY_2,$season);
        $manager->persist($season);


        $season = new Season();
        $season->setProgram($this->getReference(ProgramFixtures::PROGRAM_STRANGER_THINGS));
        $season->setNumber(1);
        $season->setYear(2016);
        $season->setDescription("Saison 1 de Stranger Things.");
        $this->addReference(self::SEASON_STRANGER_THINGS,$season);
        $manager->persist($season);

        $season = new Season();
        $season->setProgram($this->getReference(ProgramFixtures::PROGRAM_STRANGER_THINGS));
        $season->setNumber(2);
        $season->setYear(2017);
        $season->setDescription("Saison 2 de Stranger Things.");
        $this->addReference(self::SEASON_STRANGER_THINGS_2,$season);
        $manager->persist($season);


        $season = new Season();
        $season->setProgram($this->getReference(ProgramFixtures::PROGRAM_THE_BOYS));
        $season->setNumber(1);
        $season->setYear(2019);
        $season->setDescription("Saison 1 de The Boys");
        $this->addReference(self::SEASON_THE_BOYS,$season);
        $manager->persist($season);

        $season = new Season();
        $season->setProgram($this->getReference(ProgramFixtures::PROGRAM_THE_BOYS));
        $season->setNumber(2);
        $season->setYear(2020);
        $season->setDescription("Saison 2 de The Boys");
        $this->addReference(self::SEASON_THE_BOYS_2,$season);
        $manager->persist($season);



        $season = new Season();
        $season->setProgram($this->getReference(ProgramFixtures::PROGRAM_GAME_OF_THRONES));
        $season->setNumber(1);
        $season->setYear(2011);
        $season->setDescription("Saison 1 de Game of Thrones");
        $this->addReference(self::SEASON_GAME_OF_THRONES,$season);
        $manager->persist($season);

        $season = new Season();
        $season->setProgram($this->getReference(ProgramFixtures::PROGRAM_GAME_OF_THRONES));
        $season->setNumber(2);
        $season->setYear(2012);
        $season->setDescription("Saison 2 de Game of Thrones");
        $this->addReference(self::SEASON_GAME_OF_THRONES_2,$season);
        $manager->persist($season);



        $season = new Season();
        $season->setProgram($this->getReference(ProgramFixtures::PROGRAM_OBI_WAN_KENOBI));
        $season->setNumber(1);
        $season->setYear(2022);
        $season->setDescription("Saison 1 d' Obi Wan Kenobi");
        $this->addReference(self::SEASON_OBI_WAN_KENOBI,$season);
        $manager->persist($season);


        $manager->flush();
    }

    public function getDependencies()
    {
        return [
           ProgramFixtures::class

        ];
    }

}
