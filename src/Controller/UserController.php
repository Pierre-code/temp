<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\ShipType;
use App\Form\UserType;
use App\Repository\CannonRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{

    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var EntityManager
     */
    private $entityManager;

    public function __construct(UserRepository $userRepository, EntityManagerInterface $entityManager)
    {
        $this->userRepository = $userRepository;
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/user", name="user")
     */
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

    /**
     * @Route("/initialisation", name="user.initialisation", methods={"GET","POST"})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function initialisation(Request $request)
    {

        // TODO - Adapter le code ci-dessous pour qu'il puisse afficher le formulaire d'enregistrement d'utilisateur et le traiter

        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($user);
            $this->entityManager->flush();
            return $this->redirectToRoute('ship');
        }

        return $this->render('user/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/user/ship", name="user_ship")
     */
    public function ship()
    {
        $user = $this->userRepository->findFirst();
        if (!$user) {
            return new Response('Pas d\'user');
        }
        $ship = $user->getShip();

        /*
         * Récupérer les canons associés au vaisseau et les stocker dans une variable $canons
         * Utiliser la méthode Ship::getCannons()
         * */

        /**
         * Envoyer le paramètre $user et $cannons à la vue
         */

        return $this->render('user/ship.html.twig', [
            'controller_name' => 'UserController',
            'ship' => $ship
        ]);
    }


    /**
     * @Route("user/ship/edit", name="user.ship.edit")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
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
