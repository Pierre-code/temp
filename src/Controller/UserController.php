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

        $canons = $ship->getCannons();

        // Récupérer tous les canons avec la méthode $ship::getCanons();

        // On affiche la vue ship.html.twig
        // On lui envoie les paramètres 'controlleur_name', 'ship', 'user'. On peut envoyer tout ce qu'on veut !
        return $this->render('user/ship.html.twig', [
            'controller_name' => 'UserController',
            'ship' => $ship,
            'canons' => $canons,
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
