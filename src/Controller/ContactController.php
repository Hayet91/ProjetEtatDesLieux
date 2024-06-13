<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/contact")
 */
class ContactController extends AbstractController
{
   

    /**
     * @Route("/", name="contact_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ContactRepository $contactRepository): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
           $contactRepository->add($contact, true);

           $contact = new Contact();
           $form = $this->createForm(ContactType::class, $contact);  
           $this->addFlash('success', ' Votre message à bien été envoyé ');
        //    return $this->redirectToRoute('homepage');
        }

        if($form->isSubmitted() && !$form->isValid()){
            $this->addFlash('warning', ' le formulaire contient des erreurs veuillez corriger et réessayer ');
            
        }
            

        return $this->renderForm('contact/new.html.twig', [
            'contact' => $contact,
            'form' => $form,

        ]);
    }

}


