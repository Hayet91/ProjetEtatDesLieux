<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EtatDesLieuxController extends AbstractController
{
    /**
     * @Route("/etat/des/lieux", name="app_etat_des_lieux")
     */
    public function index(): Response
    {
        return $this->render('etat_des_lieux/index.html.twig', [
            'controller_name' => 'EtatDesLieuxController',
        ]);
    }
}
