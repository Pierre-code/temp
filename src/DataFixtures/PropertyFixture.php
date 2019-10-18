<?php

namespace App\DataFixtures;


use App\Entity\User;
use App\Entity\Ship;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class PropertyFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
    	// use the factory to create a Faker\Generator instance
		$faker = Factory::create('fr_FR');
    		for($i =0;  $i<80; $i++){
    			$user = new User();
    			$user->setName($faker->name);
                $user->setNote($faker ->numberBetween(10,1000));
                //$user->setShip($faker  ->ship);

				$manager->persist($user);



    	}
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
