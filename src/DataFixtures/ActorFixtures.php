<?php

namespace App\DataFixtures;

use App\Entity\Actor;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ActorFixtures extends Fixture
{
    const ACTORS = [
        'Ewan McGregor',
        'Emilia Clarke',
        'Jim Parsons',
        'Karl Urban',

    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::ACTORS as $key => $actorName){
            $actor = new Actor();
            $actor->setName($actorName);
            $manager->persist($actor);
        }
        $manager->flush();
    }
}
