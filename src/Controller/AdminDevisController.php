<?php

namespace App\Controller;

use App\Entity\Devis;
use App\Form\Devis1Type;
use App\Repository\DevisRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/devis")
 */
class AdminDevisController extends AbstractController
{
    /**
     * @Route("/", name="app_admin_devis_index", methods={"GET"})
     */
    public function index(DevisRepository $devisRepository): Response
    {
        return $this->render('admin_devis/index.html.twig', [
            'devis' => $devisRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_admin_devis_new", methods={"GET", "POST"})
     */
    public function new(Request $request, DevisRepository $devisRepository): Response
    {
        $devi = new Devis();
        $form = $this->createForm(Devis1Type::class, $devi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $devisRepository->add($devi, true);

            return $this->redirectToRoute('app_admin_devis_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_devis/new.html.twig', [
            'devi' => $devi,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_devis_show", methods={"GET"})
     */
    public function show(Devis $devi): Response
    {
        return $this->render('admin_devis/show.html.twig', [
            'devi' => $devi,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_admin_devis_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Devis $devi, DevisRepository $devisRepository): Response
    {
        $form = $this->createForm(Devis1Type::class, $devi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $devisRepository->add($devi, true);

            return $this->redirectToRoute('app_admin_devis_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_devis/edit.html.twig', [
            'devi' => $devi,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_devis_delete", methods={"POST"})
     */
    public function delete(Request $request, Devis $devi, DevisRepository $devisRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$devi->getId(), $request->request->get('_token'))) {
            $devisRepository->remove($devi, true);
        }

        return $this->redirectToRoute('app_admin_devis_index', [], Response::HTTP_SEE_OTHER);
    }
}
