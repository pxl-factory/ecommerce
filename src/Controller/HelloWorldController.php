<?php 
namespace App\Controller;

use Twig\Environment;
use App\Taxes\Calculator;
use Cocur\Slugify\Slugify;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloWorldController {
    protected $logger;
    protected $calculator;
    public function __construct(Calculator $calculator, LoggerInterface $logger, Slugify $slug)
    {
        $this->logger = $logger;
        $this->calculator = $calculator;
    }
    /** 
     * @Route("/Hello/{word?World}", name="HelloWorld")
     */
public function HelloWorld(Request $request, $word, Environment $env){
    $slugify = new Slugify();
    dump($slugify);
    dump($env);
    $this->logger->info("message de log");
    $tva = $this->calculator->calcul(200);
    return new Response("Hello $word" . "la tva est $tva");
    }
}