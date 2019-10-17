<?php

namespace App\Controller;

use App\Entity\Cannon;
use App\Form\CannonType;
use App\Repository\CannonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CannonController extends AbstractController
{
    public function index(CannonRepository $cannonRepository): Response
    {
        return $this->render('cannon/index.html.twig', [
            'cannons' => $cannonRepository->findAll(),
        ]);
    }

    public function new(Request $request): Response
    {
        $cannon = new Cannon();
        $form = $this->createForm(CannonType::class, $cannon);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($cannon);
            $entityManager->flush();

            return $this->redirectToRoute('cannon_index');
        }

        return $this->render('cannon/new.html.twig', [
            'cannon' => $cannon,
            'form' => $form->createView(),
        ]);
    }

    public function show(Cannon $cannon): Response
    {
        return $this->render('cannon/show.html.twig', [
            'cannon' => $cannon,
        ]);
    }

    public function edit(Request $request, Cannon $cannon): Response
    {
        $form = $this->createForm(CannonType::class, $cannon);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cannon_index');
        }

        return $this->render('cannon/edit.html.twig', [
            'cannon' => $cannon,
            'form' => $form->createView(),
        ]);
    }

    public function delete(Request $request, Cannon $cannon): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cannon->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($cannon);
            $entityManager->flush();
        }

        return $this->redirectToRoute('cannon_index');
    }
}
