<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SecurityController extends Controller
{
    /**
     * @Route("/inscription", name="inscription")
     */
    public function index()
    {
        $user = new User();
        $form = $this->createform(RegistrationFormType::class);
        return $this->render('security/index.html.twig', [
            'form' => $form
        ]);
    }
}
