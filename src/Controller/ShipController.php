<?php

namespace App\Controller;

use App\Entity\Ship;
use App\Form\ShipType;
use App\Repository\ShipRepository;
use App\Repository\UserRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ShipController extends AbstractController
{
    private $repository;
    private $entityManager;
    private $userRepository;

    public function __construct(ShipRepository $repository, UserRepository $userRepository, EntityManagerInterface $entityManager)
    {
        $this->repository = $repository;
        $this->entityManager = $entityManager;
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $ships = $this->repository->findAllShips();
        $user = $this->userRepository->findFirst();

        if (!$user) {
            return new Response(
        '<html lang="fr_FR">
                    <body>
                        Erreur, l\'utilisateur n\'existe pas encore, il faut d\'abord le créer.
                        Patience, vous pourrez bientôt choisir votre vaisseau, mais en attendant, 
                        rendez-vous sur <a href="/initialisation">cette page</a>. 
                    </body>
                </html>'
            );
        }

        return $this->render('ship/index.html.twig', [
            'controller_name' => 'ShipController',
            'ships' => $ships,
            'user' => $user,
        ]);
    }

    public function choose(Ship $ship)
    {
        if (!$ship) {
            return new Response(
                '<html lang="fr_FR"><body>Erreur, le ship'. $ship->getId() .' n\'existe pas. </body></html>'
            );
        }
        $user = $this->userRepository->findFirst();
        $user->setShip($ship);
        $this->entityManager->persist($user);
        $this->entityManager->flush();

        // Permet d'afficher un message de succès, aller voir /templates/user/ship.html.twig pour voir comment on l'affiche !
        $this->addFlash("choose_success", "Excellent choix Senior !");

        return $this->redirectToRoute('user_ship');
    }


    public function edit(Request $request) {
        $user = $this->userRepository->findFirst();
        $ship = $user->getShip();
        $form = $this->createForm(ShipType::class, $ship);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->flush();
            // Utiliser la méthode redirectToRoute vers user_ship en cas de succès
        }

        // Utiliser la méthode addFlash() pour afficher un message de succès.
        // Un exemple d'utilisation se trouve dans la méthode choose de ShipController.

        return $this->render('user/ship_edit.html.twig', [
            'controller_name' => 'UserController',
            'ship' => $ship,
            'form' => $form->createView(),
        ]);
    }
}
