<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\UserSearch;

use App\Form\ShipType;
use App\Form\UserSearchType;
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

    // Inclure le paramètre $paginator de type PaginatorInterface
    public function index(Request $request, PaginatorInterface $paginator):Response
    {
       // Récupérer tous les users ici dans une variable $users

        //On paramètre la pagination en précisant le nombre d'elements qu'on veut afficher par page

        // appeler la méthode paginate de $paginator
        // En paramètres : La liste des utilisateurs, le numéro de la page ($request->query->getInt('page', 1)
        // La limite à 6

        // Envoyer le résultat de cette méthode à la vue

        return $this->render('user/list.html.twig', [
            'controller_name' => 'UserController',
            'users' => [
                ["name" => "Remplacer ça par des vrais users, Carlos !"]
            ],
        ]);


    }

    public function initialisation(Request $request)
    {

        $existing_users = $this->userRepository->findAll();
        $this->removeUsers($existing_users);


        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($user);
            $this->entityManager->flush();
            return $this->redirectToRoute('ship_index');
        }

        return $this->render('user/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    public function ship()
    {
        $user = $this->userRepository->findFirst();

        // S'il n'y a pas de User en base de données on arrête tout !
        if (!$user) {
            return new Response('Pas d\'user. Créer un user <a href="/">ici</a>');
        }

        // On récupère le vaisseau du User
        $ship = $user->getShip();

        if (!$ship) {
            return new Response(
        '<html lang="fr_FR">
                    <body>
                        Erreur, le vaisseau n\'a pas encore été choisi !
                        Rendez-vous sur <a href="/ship">cette page</a> pour choisir. 
                    </body>
                </html>'
            );
        }

        // Récupérer tous les canons avec la méthode $ship->getCanonns();

        // On affiche la vue ship.html.twig
        // On lui envoie les paramètres 'controlleur_name', 'ship', 'user'. On peut envoyer tout ce qu'on veut !
        return $this->render('user/ship.html.twig', [
            'controller_name' => 'UserController',
            'ship' => $ship,
        ]);
    }

    /**
     * @param array $existing_users la liste des utilisateurs que l'on veut supprimer
     *
     */
    private function removeUsers(array $existing_users)
    {
        foreach ($existing_users as $user) {
            $this->entityManager->remove($user);
        }
            $this->entityManager->flush();
    }
}
