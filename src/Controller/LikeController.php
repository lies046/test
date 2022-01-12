<?php

namespace App\Controller;

use App\Entity\Post;
use App\Entity\User;
use App\Repository\PostRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class LikeController extends AbstractController
{
    #[Route('/like', methods: 'POST')]
    public function likeAction(Request $request, PostRepository $postRepository, UserRepository $userRepository)
    {
        /** @var Post $post */
        $post = $postRepository->find($request->request->get('post_id'));

        /** @var User $user */
        $user = $userRepository->find($request->request->get('user_id'));
        return $this->json('success');
    }
}