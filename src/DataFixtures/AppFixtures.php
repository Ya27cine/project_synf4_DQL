<?php

namespace App\DataFixtures;

use App\Entity\Utilisateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
class AppFixtures extends Fixture
{
    private $faker;
    public function load(ObjectManager $manager)
    {
        $this->faker = Factory::create();
        $this->addUser($manager);
        // $product = new Product();
        // $manager->persist($product);

        //$manager->flush();
    }

    public function addUser(ObjectManager $manager){

        for($i=0; $i < 100; $i++) {
            $user = new Utilisateur();
            $user->setNom( $this->faker->firstName );
            $user->setPrenom($this->faker->lastName);
            $user->setDateDeNaiss( new \DateTime() );
            $user->setEmail($this->faker->email);
            $user->setPaye($this->faker->country);
            $user->setLogin($this->faker->ipv4);

            $manager->persist($user);
        }
        $manager->flush();
    }
}
