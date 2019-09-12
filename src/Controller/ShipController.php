<?php

namespace App\Controller;

use App\Entity\Ship;
use App\Entity\User;
use phpDocumentor\Reflection\Types\Integer;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShipController extends AbstractController
{
    /**
     * @Route("/ship", name="ship")
     */
    public function index()
    {
        $ships = $this->getDoctrine()
            ->getRepository(Ship::class)
            ->findAll();


        return $this->render('ship/index.html.twig', [
            'controller_name' => 'ShipController',
            'ships' => $ships
        ]);
    }

    /**
     * @Route("/ship/choose/{id}", methods={"GET"}, name="choose_ship")
     * @param Int $id
     * @return Response|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function choose(Int $id)
    {
        $ship = $this->getDoctrine()->getRepository(Ship::class)->find($id);
        if (!$ship) {
            return new Response(
                '<html><body>Erreur, le ship'. $id .' n\'existe pas. </body></html>'
            );
        }
        $user = $this->getDoctrine()->getRepository(User::class)->findAll()[0];
        $user->setShip($ship);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($ship);
        $entityManager->persist($user);
        $entityManager->flush();

        return $this->redirectToRoute('user_ship');
    }
}
