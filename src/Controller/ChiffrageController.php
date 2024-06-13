<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChiffrageController extends AbstractController
{
    /**
     * @Route("/chiffrage", name="app_chiffrage")
     */
    public function index(): Response
    {
        return $this->render('chiffrage/index.html.twig', [
            'controller_name' => 'ChiffrageController',
        ]);
    }
}
