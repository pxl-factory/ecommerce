<?php 
namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/test/{age<\d+>?0}", name="test", methods={"GET", "POST"}, host="localhost", schemes={"http", "https"})
 */
class TestController {
    public function index(){
        dd("ça fonctionne");
    }

    public function test(Request $request, $age) {

        //$request = Request::createFromGlobals();
        // $age = $request->attributes->get('age');

        dump($request);
        // dd("vous avez $age ans");
        return new Response("vous avez $age ans");
    }                                                                                                                                                                                                                                                                           
}