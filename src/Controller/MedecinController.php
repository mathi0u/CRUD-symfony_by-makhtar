<?php

namespace App\Controller;

use App\Entity\Medecin;
use App\Entity\Services;
use App\Form\MedecinType;
use App\Repository\MedecinRepository;
use App\Repository\ServicesRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class MedecinController extends Controller
{
    /**
     * @Route("/", name="medecins_list")
     */
    public function index(MedecinRepository $repo_m )
    
    {   
        $meds = $repo_m->findAll();
        return $this->render('medecin/index.html.twig', [
            'meds' => $meds
        ]);
    }

    /**
     * @Route("/medecin/{matricule}", name="medecin_show" )
     */
    public function show(Medecin $medecin)
    
    {   
        $medecin->getServices();
        return $this->render('medecin/show.html.twig', [
            'med' => $medecin
        ]);

       
    }

    /**
     * @Route("/medecin/add/", name="medecin_add" )
     * @Route("/medecin/edit/{matricule}", name="medecin_edit" )
     */
    public function add(ObjectManager $em, Request $request,Medecin $medecin = null)
    
    {   
        if(!$medecin)
        {
            $medecin = new Medecin; 
        }
        $form = $this->createForm(MedecinType::class,$medecin);
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid() )
        {
            $em->persist($medecin);
            $em->flush();
            $this->addFlash('success','Medecin enregistrer avec succes');
            return $this->redirectToRoute('medecins_list');
        }
        
        return $this->render('medecin/add.html.twig', 
        [
            'form' => $form->createView()
        ]);
       
    }

    /**
     * @Route("/medecin/del/{matricule}", name="medecin_del" )
     */
    public function edit(ObjectManager $em, Request $request,Medecin $medecin)
    
    { 
        $form = $this->createForm(MedecinType::class,$medecin);
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid() )
        {
            $em->remove($medecin);
            $em->flush();
            $this->addFlash('danger','Medecin supprimer avec succes');
            return $this->redirectToRoute('medecins_list');
        }
        
        return $this->render('medecin/add.html.twig', 
        [
            'form' => $form->createView()
        ]);
       
    }
}
