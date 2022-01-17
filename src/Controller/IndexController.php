<?php

namespace App\Controller;

use App\Repository\LikeRepository;
use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(PostRepository $postRepository, LikeRepository $likeRepository): Response
    {
        $user = $this->getUser();
        $postList = $postRepository->findBy(['status' => 1]);
        $userLikeList = $likeRepository->findBy(['like_user' => $user]);
        return $this->render('index/index.html.twig', [
            'postList' => $postList,
            'userLikeList' => $userLikeList
        ]);
    }
}
