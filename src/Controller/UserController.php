<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\ShipType;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Knp\Component\Pager\PaginatorInterface;
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

    public function index(Request $request, PaginatorInterface $paginator)
    {

        $users = $this->getDoctrine()
            ->getRepository(User::class)
            ->findAll();
        //On paramètre la pagination en précisant le nombre d'elements qu'on veut afficher par page
        $list_users = $paginator->paginate(
            $users, // Requête contenant les données à paginer (les utilisateurs)
            $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
            10 // Nombre de résultats par page
        );
        return $this->render('user/list.html.twig', [
            'controller_name' => 'UserController',
            'users' => $list_users
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
