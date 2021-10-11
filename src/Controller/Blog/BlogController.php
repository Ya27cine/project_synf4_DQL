<?php
namespace App\Controller\Blog;

use App\Entity\Post;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BlogController extends AbstractController{

    /**
     * @Route("/blog", name="blog-index")
     */
    function index(){
        $em = $this->getDoctrine()->getRepository(Post::class);
        $data = $em->findAll();

        return $this->render("blog/index.html.twig", [
            "title" => "Blog Home",
            "data" => $data
        ]);
    }

    /**
     * @Route("/blog/show/{id}", name="blog-show")
     */
    function show($id){
        $em = $this->getDoctrine()->getRepository(Post::class);
        $post = $em->find($id);

        return $this->render("blog/show.html.twig", [
            "title" => "Blog Show Post",
            "post" => $post
        ]);
    }


}
?>