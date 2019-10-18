<?php

namespace App\DataFixtures;


<<<<<<< HEAD
use App\Entity\User;
use App\Entity\Ship;
=======
//use App\Entity\Property;
>>>>>>> c26d3ee91f4e8392322b184044467292bbca43b5
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class PropertyFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
    	// use the factory to create a Faker\Generator instance
		$faker = Factory::create('fr_FR');
<<<<<<< HEAD
    		for($i =0;  $i<80; $i++){
    			$user = new User();
    			$user->setName($faker->name);
                $user->setNote($faker ->numberBetween(10,1000));
                //$user->setShip($faker  ->ship);

				$manager->persist($user);
=======
    		for($i =0;  $i<100; $i++){
    			$property = new Property();
    			$property
    					->setTitle($faker ->words(3, true))
    					->setDescription($faker ->sentences(3, true))
    					->setSurface($faker ->numberBetween(20,350))
    					->setRooms($faker ->numberBetween(2,10))
    					->setBedRooms($faker ->numberBetween(1,9))
    					->setFloor($faker ->numberBetween(0,15))
    					->setPrice($faker ->numberBetween(100000, 1000000))
    					->setHeat($faker ->numberBetween(0, count(Property::HEAT) -1))
						->setCity($faker ->city)
						->setAddress($faker ->address)
						->setPostalCode($faker ->postcode)
						->setSolde($faker ->false);
				$manager->persist($property);
>>>>>>> c26d3ee91f4e8392322b184044467292bbca43b5



    	}
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
