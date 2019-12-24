<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class SpecialiteController extends Controller
{
    /**
     * @Route("/specialite", name="specialite")
     */
    public function index()
    {
        return $this->render('specialite/index.html.twig', [
            'controller_name' => 'SpecialiteController',
        ]);
    }
}
