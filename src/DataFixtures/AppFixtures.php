<?php

namespace App\DataFixtures;

// src/DataFixtures/AppFixtures.php
namespace App\DataFixtures;

use App\Entity\Ship;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $shipNames = ['Le andré destroyer', 'Le Schtroumpf grognon', 'Richard Parker'];
        for ($i = 0; $i < 3; $i++) {
            $ship = new Ship();
            $ship->setName($shipNames[$i]);
            $ship->setPrice(mt_rand(10, 10000));
            $ship->setTaille(mt_rand(10, 500));
            $ship->setType("Destroyer");
            $manager->persist($ship);
        }

        $manager->flush();
    }
}