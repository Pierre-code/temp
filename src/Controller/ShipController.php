<?php

namespace App\Controller;

use App\Entity\Ship;
use App\Repository\ShipRepository;
use App\Repository\UserRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ShipController extends AbstractController
{
    private $repository;
    private $em;
    private $userRepository;

    public function __construct(ShipRepository $repository, ObjectManager $em, UserRepository $userRepository)
    {
        $this->repository = $repository;
        $this->em = $em;
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
                '<html lang="fr_FR"><body>Erreur, le ship'. $id .' n\'existe pas. </body></html>'
            );
        }
        $user = $this->userRepository->findFirst();
        $user->setShip($ship);
        $this->em->persist($user);
        $this->em->flush();

        return $this->redirectToRoute('user_ship', ['message' => 'Vous avez choisi le bon vaisseau, amigo !']);
    }
}
