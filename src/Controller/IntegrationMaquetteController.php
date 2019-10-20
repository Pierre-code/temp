<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IntegrationMaquetteController extends AbstractController
{
    /**
     * @Route("/integration/maquette", name="integration_maquette")
     */
    public function index()
    {
        return $this->render('integration_maquette/index.html.twig', [
            'controller_name' => 'IntegrationMaquetteController',
        ]);
    }
}
