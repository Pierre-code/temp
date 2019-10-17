<?php

namespace App\Controller;

use App\Entity\Planet;
use App\Form\PlanetType;
use App\Repository\PlanetRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PlanetController extends AbstractController
{
    public function index(PlanetRepository $planetRepository): Response
    {
        return $this->render('planet/index.html.twig', [
            'planets' => $planetRepository->findAll(),
        ]);
    }

    public function new(Request $request): Response
    {
        $planet = new Planet();
        $form = $this->createForm(PlanetType::class, $planet, array(
            'action' => $this->generateUrl($request->get('_route'))
        ));
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($planet);
            $entityManager->flush();

            return new Response('success');
        }

        return $this->render('planet/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    public function show(Planet $planet): Response
    {
        return $this->render('planet/show.html.twig', [
            'planet' => $planet,
        ]);
    }

    public function edit(Request $request, Planet $planet): Response
    {
        $form = $this->createForm(PlanetType::class, $planet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('planet_index');
        }

        return $this->render('planet/edit.html.twig', [
            'planet' => $planet,
            'form' => $form->createView(),
        ]);
    }

    public function delete(Request $request, Planet $planet): Response
    {
        if ($this->isCsrfTokenValid('delete'.$planet->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($planet);
            $entityManager->flush();
        }

        return $this->redirectToRoute('planet_index');
    }
}
