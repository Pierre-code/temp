<?php

namespace App\Controller;

use App\Entity\Planet;
use App\Form\PlanetType;
use App\Repository\PlanetRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PlanetController extends AbstractController
{
    private $entityManager;
    private $planetRepository;

    public function __construct(EntityManagerInterface $entityManager, PlanetRepository $planetRepository)
    {
        $this->entityManager = $entityManager;
        $this->planetRepository = $planetRepository;
    }

    public function index(): Response
    {
        $planet = new Planet();
        $form = $this->createForm(PlanetType::class, $planet, array(
            'action' => 'planet_create'
        ));

        return $this->render('planet/index.html.twig', [
            'planets' => $this->planetRepository->findAll(),
            'form' => $form->createView(),
        ]);
    }

    public function list(): Response
    {
        $this->entityManager->flush();
        return $this->json($this->planetRepository->findAll());
    }

    public function new(Request $request): Response
    {
        $planet = new Planet();
        $planet->setName($request->request->get('name'));
        $this->entityManager->persist($planet);
        $this->entityManager->flush();

        return new Response('Success');
    }

    public function delete(Request $request, Planet $planet): Response
    {
        $this->entityManager->remove($planet);
        $this->entityManager->flush();
        return new Response('Success');
    }
}
