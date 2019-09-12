<?php

namespace App\Controller;

use App\Entity\Ship;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
}
