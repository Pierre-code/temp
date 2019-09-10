<?php
// src/Controller//Util/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class LuckyController
{
    /**
    * @Route("/lucky/number")
    */
    public function lucky_number()
    {
        $number = random_int(0, 10000);

        return new Response(
            '<html><body>Lucky number: '.$number.'</body></html>'
        );
    }

    public function generatePositive()
    {
        $number = random_int(0, 10000);

        return $number;
    }
}