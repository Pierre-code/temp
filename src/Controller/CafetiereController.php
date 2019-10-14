<?php

namespace App\Controller;

use App\Entity\Cafetiere;
use App\Form\CafetiereType;
use App\Repository\CafetiereRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/cafetiere")
 */
class CafetiereController extends AbstractController
{
    /**
     * @Route("/", name="cafetiere_index", methods={"GET"})
     */
    public function index(CafetiereRepository $cafetiereRepository): Response
    {
        /**
         * Redirection vers l'index de "Cafetiere" en retournant toutes les valeurs de "cafetieres"
         * depuis le Repository de celui-ci.
         */
    }

    /**
     * @Route("/new", name="cafetiere_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        /** Créer une NOUVELLE variable $cafetiere correspond à l'entity "Cafetiere" */

        /** Créer une variable formulaire qui a pour type la classe Cafetiere et qui a pour valeur la variable
         *précédente
         */

        /** Récupérer la requête correspondant au formualaire */

        /**
         * Condition "If" pour formulaire soumis ET validé
            * Créer une variable $entityManager correspondant à $this->getDoctrine()->getManager();
            * Faire un persist() de $entityManager avec comme paramètre $cafetiere
            * Faire un flush() de $entityManager
            * rediriger vers la route "/cafetiere/"
         */

        /**
         * Redirection vers la page new de "Cafetiere" en retournant une valeur de "cafetiere" et la création d'une
         * vue de formulaire
         */
    }

    /**
     * @Route("/{id}", name="cafetiere_show", methods={"GET"})
     */
    public function show(Cafetiere $cafetiere): Response
    {
        /**
         * Redirection vers la page show de "Cafetiere" en retournant une valeur de "cafetiere"
         */
    }

    /**
     * @Route("/{id}/edit", name="cafetiere_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Cafetiere $cafetiere): Response
    {
        /** Créer une variable formulaire qui a pour type la classe Cafetiere et qui récupère la variable
         * $cafetiere
         */

        /** Récupérer la requête correspondant au formualaire */

        /**
         * Condition "If" pour formulaire soumis ET validé
             * Faire un $this->getDoctrine()->getManager()->flush();
             *
             * rediriger vers la route "/cafetiere/"
         */

        /**
         * Redirection vers la page edit de "Cafetiere" en retournant une valeur de "cafetiere" et la création d'une
         * vue de formulaire
         */
    }

    /**
     * @Route("/{id}", name="cafetiere_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Cafetiere $cafetiere): Response
    {
        /**
         * Condition "If" pour le Token CSRF validé qui a pour id: "delete.(id de la cafetiere)" et en paramètre
         * un request du token par la variable $request
             * Créer une variable $entityManager correspondant à $this->getDoctrine()->getManager();
             * Faire un remove() de $entityManager avec comme paramètre $cafetiere
             * Faire un flush() de $entityManager
         */

        /**
         * Redirection vers la route "Cafetiere"
         */
    }
}
