<?php
namespace App\Controller;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    const _array =[
            ["id"=>1, "name"=>"hello"],
            ["id"=>2, "name"=>"wrold"]
        ];
    /**
     * @Route("/test", name="page_test")
     * */
    function test()
    {

        $num = random_int(1, 100);
        return new Response(
            "<p> Hello world ! u have : " . $num . " </p>"
        );
    }





        /**
         * @Route("/home", name="page_show")
         * */
        function home() : Response
        {
            $repo = $this->getDoctrine()->getRepository(User::class);
            $users = $repo->findAll();

            return $this->render('pages/home.html.twig',[
                'title' => 'Page test DQl',
                'm_date' => '2021-02-26',
                'users' => $users
            ]);
        }
        /**
         * @Route("/show/{id}", name="show_one_users")
         * */
        function showOneUser($id) : Response
        {
            $repo = $this->getDoctrine()->getRepository(User::class);
            $user = $repo->find($id);

            return $this->render('pages/show.html.twig',[
                'title' => 'Page test DQl',
                'm_date' => '2021-02-26',
                'user' => $user
            ]);
        }

        

}
?>