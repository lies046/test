<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class LikeController extends AbstractController
{
    #[Route('/like', methods: ['GET','POST'])]
    public function likeAction(Request $request)
    {
        dd(json_decode($request->getContent(), true));
        $data = json_decode($request->getContent(), true);
      dd($data);
    }
}