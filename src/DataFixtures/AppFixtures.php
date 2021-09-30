<?php

namespace App\DataFixtures;

use App\Entity\Comment;
use App\Entity\Image;
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

        $this->creatUsers($manager);

        $this->createPosts($manager);

        $this->creatComments($manager);

        $this->creatTags($manager);

        $this->creatImages($manager);

    }

    // Gene User
    public function creatUsers(ObjectManager $manager){

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

    // Gene tags
    public function creatTags(ObjectManager $manager){

        for($i=0; $i < self::LIMIT_ROWS; $i++) {
            $tag = new Tag();
            $tag->setName( $this->faker->jobTitle);

            $post = $this->getReference($i.'_post');
            $tag->addPost( $post );

            $manager->persist($tag);
        }
        $manager->flush();
    }

    // Gene images
    public function creatImages(ObjectManager $manager){

        for($i=0; $i < self::LIMIT_ROWS; $i++) {
            $img = new Image();
            $img->setUrl($this->faker->imageUrl($width = 640, $height = 480));

            $post = $this->getReference($i.'_post');
            $img->setPost($post);
          

            $manager->persist($img);
        }
        $manager->flush();
    }
}
