<?php

namespace App\DataFixtures;

use App\Entity\Comment;
use App\Entity\Post;
use App\Entity\Tag;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private const LIMIT_ROWS = 50;
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

    // Gene User
    public function addUser(ObjectManager $manager){

        for($i=0; $i < self::LIMIT_ROWS; $i++) {
            $user = new User();
            $user->setFullname( $this->faker->firstName.' '.$this->faker->lastName );
            $user->setUsername( $this->faker->userName );
            $user->setPassword($this->passwordEncoder->encodePassword($user, "@000@"));

            $user->setEmail($this->faker->email);
            $user->setPhone($this->faker->phoneNumber);
            $user->setAdress($this->faker->address);

            $this->addReference($i.'_user', $user);
            $manager->persist($user);
        }
        $manager->flush();
    }

    // GenePost
    public function createPosts(ObjectManager $manager){

        for($i=0; $i < self::LIMIT_ROWS; $i++) {
            $post = new Post();
            $post->setTitle( $this->faker->sentence($nbWords = 6, $variableNbWords = true) );
            $post->setContent( $this->faker->text());          
            $post->setPublished(new \DateTime());

            $user =     $this->getReference($i.'_user');
            $post->setUser($user);
           
            $this->addReference($i.'_post', $post);
            $manager->persist($post);
        }
        $manager->flush();
    }

    // GenePost
    public function creatComments(ObjectManager $manager){

        for($i=0; $i < self::LIMIT_ROWS; $i++) {
            $comment = new Comment();
            $comment->setContent( $this->faker->text());          
            $comment->setPublished(new \DateTime());

            $user =     $this->getReference($i.'_user');
            $comment->setUser($user);
            $post =     $this->getReference($i.'_post');
            $comment->setPost($post);
           
            $manager->persist($comment);
        }
        $manager->flush();
    }

    // GenePost
    public function creatTags(ObjectManager $manager){

        for($i=0; $i < self::LIMIT_ROWS; $i++) {
            $comment = new Tag();
           
           
            $manager->persist($comment);
        }
        $manager->flush();
    }
}
