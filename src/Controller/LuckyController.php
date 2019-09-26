<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;


class LuckyController
{	
	public function index()
    {
        
        return new Response(
            '<html><body>Home Page for this controller</body></html>'
        );
    }
	
    public function number()
    {
        $number = random_int(0, 100);

        return new Response(
            '<html><body>Lucky number: '.$number.'</body></html>'
        );
    }
}

