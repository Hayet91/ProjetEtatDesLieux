<?php

namespace App\Controller;

use App\Entity\Devis;
use App\Repository\DevisRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\DevisType;
use App\Repository\ContactRepository;
use Container3nAbAMD\getDevisTypeService;

class DevisController extends AbstractController
{
    /**
     * @Route("/devis", name="app_devis")
     */
    public function index(Request $request, DevisRepository $devisRepository): Response
    {
        $devis = new Devis();
        $form = $this->createForm(DevisType::class, $devis);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $devisRepository->add($devis, true);
 
            $devis = new Devis();
            $form = $this->createForm(DevisType::class, $devis);  
            $this->addFlash('success', ' Votre message à bien été envoyé ');
         //    return $this->redirectToRoute('homepage');
         }
         if($form->isSubmitted() && !$form->isValid()){
            $this->addFlash('warning', ' le formulaire contient des erreurs veuillez corriger et réessayer ');
            
        }
            
        
        return $this->render('devis/index.html.twig', [
            'devis' => $devis,
            'form' => $form->createView(),
        
        ]);

    }
}




