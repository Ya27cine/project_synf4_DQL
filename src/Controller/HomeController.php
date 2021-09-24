<?php
namespace App\Controller;

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
         * @Route("/home", name="page_home")
         * */
        function index() : Response
        {

            return $this->render('pages/home.html.twig',[
                'title' => 'page test DQl',
                'm_date' => '2021-02-26'
            ]);
        }

}
?>