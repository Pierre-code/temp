<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class JavaScriptController extends AbstractController
{
    public function index()
    {
        return $this->render('java_script/index.html.twig', [
            'controller_name' => 'JavaScriptController',
        ]);
    }
}
