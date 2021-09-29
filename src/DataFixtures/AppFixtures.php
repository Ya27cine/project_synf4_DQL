<?php

namespace App\DataFixtures;

use App\Entity\Post;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $faker;
    private $passwordEncoder;

    function  __construct(UserPasswordEncoderInterface $passwordEncoder){
        $this->passwordEncoder = $passwordEncoder;
    }

   
    public function load(ObjectManager $manager)
    {
        $this->faker = Factory::create('fr_FR');
        $this->addUser($manager);
        // $product = new Product();
        // $manager->persist($product);

        //$manager->flush();
    }

    public function addUser(ObjectManager $manager){

        for($i=0; $i < 10; $i++) {
            $user = new User();
            $user->setFullname( $this->faker->firstName.' '.$this->faker->lastName );
            $user->setUsername( $this->faker->userName );
            $user->setPassword($this->passwordEncoder->encodePassword($user, "@000@"));

            $user->setEmail($this->faker->email);
            $user->setPhone($this->faker->phoneNumber);
            $user->setAdress($this->faker->address);

            $manager->persist($user);
        }
        $manager->flush();
    }
}
