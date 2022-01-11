<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class LikeController extends AbstractController
{
    #[Route('/like', methods: 'POST')]
    public function likeAction(Request $request, PostRepository $postRepository)
    {
        $postId = $request->request->get('post_id');
        $post = $postRepository->find($postId);
        dd($post);
    }
}