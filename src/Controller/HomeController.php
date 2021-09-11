<?php
namespace App\Controller;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController{
/**
 * @Route("/", name="homepage")
 */
    public function homepage(){

        
        return $this->render('home.html.twig');

    }
}