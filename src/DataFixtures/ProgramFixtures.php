<?php

namespace App\DataFixtures;

use App\Entity\Episode;
use App\Entity\Program;
use App\Repository\ActorRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{
    public const PROGRAM_THE_BIG_BANG_THEORY = 'PROGRAM_THE_BIG_BANG_THEORY';
    public const PROGRAM_STRANGER_THINGS = 'PROGRAM_STRANGER_THINGS';
    public const PROGRAM_THE_BOYS = 'PROGRAM_THE_BOYS';
    public const PROGRAM_GAME_OF_THRONES = 'PROGRAM_GAME_OF_THRONES';
    public const PROGRAM_OBI_WAN_KENOBI = 'PROGRAM_OBI_WAN_KENOBI';



    public function load(ObjectManager $manager): void
    {
        $program = new Program();
        $program->setTitle('The Big Bang Theory');
        $program->setSynopsis("Leonard Hofstadter et Sheldon Cooper vivent en colocation à Los Angeles. Ce sont tous deux des physiciens surdoués, « geeks » de surcroît.Leur univers routinier est perturbé lorsqu'une jeune femme, Penny, s'installe dans l'appartement d'en face.");
        $program->setPoster("https://upload.wikimedia.org/wikipedia/fr/6/69/BigBangTheory_Logo.png");
        $program->setCountry('États-Unis');
        $program->setYear(2007);
        $program->setCategory($this->getReference('category_5'));
        $this->addReference(self::PROGRAM_THE_BIG_BANG_THEORY,$program);
        $manager->persist($program);


        $program = new Program();
        $program->setTitle('Stranger Things');
        $program->setSynopsis("En 1983, à Hawkins dans l'Indiana, Will Byers disparaît de son domicile. ");
        $program->setPoster("https://pbs.twimg.com/media/FUPGokIWQAA1RIn.jpg");
        $program->setCountry('États-Unis');
        $program->setYear(2016);
        $program->setCategory($this->getReference('category_4'));
        $this->addReference(self::PROGRAM_STRANGER_THINGS,$program);
        $manager->persist($program);


        $program = new Program();
        $program->setTitle('The Boys');
        $program->setSynopsis("Lorsque les super-héros abusent de leurs super-pouvoirs au lieu de les utiliser pour faire le bien, les Boys se lancent dans une quête héroïque pour révéler la vérité sur The Seven et Vought, le conglomérat qui couvre leurs sales secrets.");
        $program->setPoster("https://upload.wikimedia.org/wikipedia/fr/d/d7/The_Boys_%28s%C3%A9rie_t%C3%A9l%C3%A9vis%C3%A9e%29_Logo.png");
        $program->setCountry('États-Unis');
        $program->setYear(2019);
        $program->setCategory($this->getReference('category_0'));
        $this->addReference(self::PROGRAM_THE_BOYS,$program);
        $manager->persist($program);


        $program = new Program();
        $program->setTitle('Game of Thrones');
        $program->setSynopsis("Neuf familles nobles rivalisent pour le contrôle du Trône de Fer dans les sept royaumes de Westeros. Pendant ce temps, des anciennes créatures mythiques oubliées reviennent pour faire des ravages.");
        $program->setPoster("https://www.1min30.com/wp-content/uploads/2019/01/Game-of-Thrones-logo-1.jpg");
        $program->setCountry('États-Unis');
        $program->setYear(2011);
        $program->setCategory($this->getReference('category_8'));
        $this->addReference(self::PROGRAM_GAME_OF_THRONES,$program);
        $manager->persist($program);

        $program = new Program();
        $program->setTitle('Obi-Wan Kenobi');
        $program->setSynopsis("Le Maître Jedi fait face aux conséquences de sa plus grande défaite: la chute et la corruption de son ancien ami et apprenti, Anakin Skywalker, qui s'est tourné vers le côté obscur en tant que Dark Vador.");
        $program->setPoster("https://upload.wikimedia.org/wikipedia/fr/thumb/c/cb/Logo_Obi-Wan_Kenobi.png/330px-Logo_Obi-Wan_Kenobi.png");
        $program->setCountry('États-Unis');
        $program->setYear(2022);
        $program->setCategory($this->getReference('category_9'));

        $this->addReference(self::PROGRAM_OBI_WAN_KENOBI,$program);
        $manager->persist($program);


        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CategoryFixtures::class,


        ];
    }
}
