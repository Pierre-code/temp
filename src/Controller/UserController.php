<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\ShipType;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends AbstractController
{
    private $userRepository;
    private $entityManager;

    public function __construct(UserRepository $userRepository, EntityManagerInterface $entityManager)
    {
        $this->userRepository = $userRepository;
        $this->entityManager = $entityManager;
    }

    public function index()
    {
        $users = $this->getDoctrine()
            ->getRepository(User::class)
            ->findAll();

        return $this->render('user/create.html.twig', [
            'controller_name' => 'UserController',
            'users' => $users
        ]);
    }

    public function initialisation(Request $request)
    {

        // TODO - Adapter le code ci-dessous pour qu'il puisse afficher le formulaire d'enregistrement d'utilisateur et le traiter

        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($user);
            $this->entityManager->flush();
            return $this->redirectToRoute('ship_index');
        }

        return $this->render('user/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    public function ship()
    {
        $user = $this->userRepository->findFirst();
        if (!$user) {
            return new Response('Pas d\'user');
        }
        $ship = $user->getShip();

        // Récupérer tous les canons avec la méthode $ship::getCanons();

        return $this->render('user/ship.html.twig', [
            'controller_name' => 'UserController',
            'ship' => $ship
        ]);
    }

    public function edit(Request $request) {
        $user = $this->userRepository->findFirst();
        $ship = $user->getShip();
        $form = $this->createForm(ShipType::class, $ship);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->flush();
            return $this->redirectToRoute('user_ship');
        }

        return $this->render('user/ship_edit.html.twig', [
            'controller_name' => 'UserController',
            'ship' => $ship,
            'form' => $form->createView(),
        ]);
    }
}
