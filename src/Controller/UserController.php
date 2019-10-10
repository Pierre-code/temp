<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="user")
     */
    public function index()
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    /**
     * @Route("/initialisation", name="user.initialisation", methods={"GET","POST"})
     */
    public function initialisation()
    {

        // TODO - Adapter le code ci-dessous pour qu'il puisse afficher le formulaire d'enregistrement d'utilisateur et le traiter

        // TODO - Créer le formulaire UserForm pour saisir un username (php bin/console make:form)
        /*
            $user = new User();
            $form = $this->createForm(UserType::class, $user);
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $this->getDoctrine()->getManager()->flush();
                TODO - Rediriger vers la route /ship
                return $this->redirectToRoute('user');
            }
            return $this->render('user/index.html.twig', [
                'cannon' => $cannon,
                'form' => $form->createView(),
            ]);
        */
    }

    /**
     * @Route("/user/ship", name="user_ship")
     */
    public function ship()
    {
        $user = $this->getDoctrine()->getRepository(User::class)->findAll()[0];
        $ship = $user->getShip();

        /*
         * TODO - Récupérer les canons associés au vaisseau et les stocker dans une variable $canons
         * Utiliser la méthode Ship::getCannons()
         * */

        return $this->render('user/ship.html.twig', [
            'controller_name' => 'UserController',
            'ship' => $ship
        ]);
    }
}
