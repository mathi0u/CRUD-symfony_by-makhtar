<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class ServicesController extends Controller
{
    /**
     * @Route("/services", name="services")
     */
    public function index()
    {
        return $this->render('services/index.html.twig', 
        [
            
        ]);
    }
}
