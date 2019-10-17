<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HeatingController extends AbstractController
{
    public function index()
    {
        return $this->render('heating/index.html.twig');
    }
}
