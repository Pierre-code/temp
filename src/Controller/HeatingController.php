<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HeatingController extends AbstractController
{
    /**
     * @Route("/heating", name="heating")
     */
    public function index()
    {
        return $this->render('heating/index.html.twig');
    }
}
