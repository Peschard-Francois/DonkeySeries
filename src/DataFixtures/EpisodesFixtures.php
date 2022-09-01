<?php

namespace App\DataFixtures;

use App\Entity\Episode;
use Couchbase\SearchOptions;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class EpisodesFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $season = new Episode();
        $season->setSeason($this->getReference(SeasonFixtures::SEASON_THE_BIG_BANG_THEORY));
        $season->setTitle("Pilot");
        $season->setNumber(1);
        $season->setSynopsis("A pair of socially awkward theoretical physicists meet their new neighbor Penny, who is their polar opposite.");
        $manager->persist($season);

        $season = new Episode();
        $season->setSeason($this->getReference(SeasonFixtures::SEASON_THE_BIG_BANG_THEORY));
        $season->setTitle("The Big Bran Hypothesis");
        $season->setNumber(2);
        $season->setSynopsis("Penny is furious with Leonard and Sheldon when they sneak into her apartment and clean it while she is sleeping.");
        $manager->persist($season);

        $season = new Episode();
        $season->setSeason($this->getReference(SeasonFixtures::SEASON_THE_BIG_BANG_THEORY_2));
        $season->setTitle("The Bad Fish Paradigm");
        $season->setNumber(1);
        $season->setSynopsis("Leonard becomes concerned when his date with Penny ends abruptly and she starts blowing him off. When told the truth, Sheldon would rather move out than keep Penny's reasons a secret from Leonard.");
        $manager->persist($season);

        $season = new Episode();
        $season->setSeason($this->getReference(SeasonFixtures::SEASON_THE_BIG_BANG_THEORY_2));
        $season->setTitle("The Codpiece Topology");
        $season->setNumber(2);
        $season->setSynopsis("Sheldon is annoyed when Leonard turns to Leslie for comfort after seeing Penny with another guy.");
        $manager->persist($season);

        $season = new Episode();
        $season->setSeason($this->getReference(SeasonFixtures::SEASON_STRANGER_THINGS));
        $season->setTitle("Chapitre Un : La Disparition de Will Byers");
        $season->setNumber(1);
        $season->setSynopsis("Une évasion d'un laboratoire du gouvernement et la disparition d'un jeune garçon viennent perturber l'équilibre tranquille de la petite ville d'Hawkins dans l'Indiana. Puis, d'étranges phénomènes commencent à se produire.");
        $manager->persist($season);

        $season = new Episode();
        $season->setSeason($this->getReference(SeasonFixtures::SEASON_STRANGER_THINGS));
        $season->setTitle("Chapitre Deux : La Barjot de Maple Street");
        $season->setNumber(2);
        $season->setSynopsis("Lucas, Mike et Dustin tentent de parler à la fille qu'ils ont trouvée dans les bois; Hopper questionne une Joyce anxieuse au sujet d'un appel téléphonique troublant.");
        $manager->persist($season);

        $season = new Episode();
        $season->setSeason($this->getReference(SeasonFixtures::SEASON_STRANGER_THINGS_2));
        $season->setTitle("Chapitre Un : MADMAX");
        $season->setNumber(1);
        $season->setSynopsis("Hawkins se prépare à fêter Halloween. Will, Mike, Dustin et Lucas continuent à traîner ensemble et découvrent que quelqu'un a battu leurs scores à la salle d'arcade, signant son record MADMAX. Le lendemain, une nouvelle élève arrive dans leur classe.");
        $manager->persist($season);

        $season = new Episode();
        $season->setSeason($this->getReference(SeasonFixtures::SEASON_STRANGER_THINGS_2));
        $season->setTitle("Chapitre Deux : Des bonbons ou un sort, espèce de taré");
        $season->setNumber(2);
        $season->setSynopsis("Après l'expérience terrifiante de Will lors de la nuit d'Halloween, Mike se demande si Onze traîne encore dans le coin. Obsédée par Barbara, Nancy veut parler.");
        $manager->persist($season);

        $season = new Episode();
        $season->setSeason($this->getReference(SeasonFixtures::SEASON_THE_BOYS));
        $season->setTitle("La règle du jeu");
        $season->setNumber(1);
        $season->setSynopsis("Lorsqu'un Supe tue l'amour de sa vie, le vendeur audiovisuel Hughie Campbell fait équipe avec Billy Butcher, un justicier bien décidé à punir les Supes corrompus. La vie de Hughie ne sera plus jamais la même.");
        $manager->persist($season);

        $season = new Episode();
        $season->setSeason($this->getReference(SeasonFixtures::SEASON_THE_BOYS));
        $season->setTitle("Cerise");
        $season->setNumber(2);
        $season->setSynopsis("Dans cet episode, les Boys deviennent des super-héros, Starlight se venge, Homelander devient méchant, et un sénateur devient plus vilain.");
        $manager->persist($season);

        $season = new Episode();
        $season->setSeason($this->getReference(SeasonFixtures::SEASON_THE_BOYS_2));
        $season->setTitle("Les innoncents");
        $season->setNumber(1);
        $season->setSynopsis("Becca se présente à la porte de Butcher et implore son aide. The Boys acceptent de soutenir Butcher, et avec Starlight, ils affrontent finalement Homelander et Stormfront. Cependant, les choses tournent mal.");
        $manager->persist($season);

        $season = new Episode();
        $season->setSeason($this->getReference(SeasonFixtures::SEASON_THE_BOYS_2));
        $season->setTitle("Le fils du Boulanger");
        $season->setNumber(2);
        $season->setSynopsis("Mallory et The Boys aident Victoria Neuman à plaider contre Vought. Hughie reçoit des nouvelles terrifiantes sur Starlight alors que Homelander et Stormfront poursuivent leur plan.");
        $manager->persist($season);

        $season = new Episode();
        $season->setSeason($this->getReference(SeasonFixtures::SEASON_GAME_OF_THRONES));
        $season->setTitle("L'hiver vient ");
        $season->setNumber(1);
        $season->setSynopsis("Au delà d'un gigantesque mur de protection de glace dans le nord de Westeros. Robert Baratheon, le roi, arrive avec son cortège au sud du mur de Winterfell pour demander de l'aide à son vieil ami Eddard Stark. Dans le même temps, sur un autre continent, les derniers survivants de l'ancien régime Targaryen sont à la recherche d'une nouvelle alliance pour reprendre leur royaume de l'usurpateur roi Robert.");
        $manager->persist($season);

        $season = new Episode();
        $season->setSeason($this->getReference(SeasonFixtures::SEASON_GAME_OF_THRONES_2));
        $season->setTitle("La Route royale");
        $season->setNumber(2);
        $season->setSynopsis("Le roi Robert Baratheon et son entourage prennent la direction du Sud avec Eddard Stark et ses filles Sansa et Arya. Sur la route, Arya a des ennuis avec le prince Joffrey, ce qui laisse à Eddard une décision difficile à prendre.");
        $manager->persist($season);

        $season = new Episode();
        $season->setSeason($this->getReference(SeasonFixtures::SEASON_OBI_WAN_KENOBI));
        $season->setTitle("Ep.1: PARTIE I");
        $season->setNumber(1);
        $season->setSynopsis("Face à une nouvelle menace de l'Empire, Obi-Wan Kenobi refait surface après des années dans l'ombre.");
        $manager->persist($season);


        $manager->persist($season);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            SeasonFixtures::class,
        ];
    }

}
