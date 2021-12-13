<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @throws \Exception
     */
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        $test = ['test' => 'hello world'];
        if (json_encode($test)){
            return $this->json(json_encode($test), 200, [],[]);
        }else{
           return throw new \Exception('エラーだよ');
        }
    }
}
