<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;


class LuckyController
{
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