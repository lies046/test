<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class LikeController extends AbstractController
{
    #[Route('/like', methods: 'POST')]
    public function likeAction(Request $request)
    {
        dd($request->request->get('post_id'));
        $data = json_decode($request->getContent(), true);
      dd($data);
    }
}