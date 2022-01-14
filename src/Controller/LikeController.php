<?php

namespace App\Controller;

use App\Entity\Like;
use App\Entity\Post;
use App\Entity\User;
use App\Repository\PostRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class LikeController extends AbstractController
{
    #[Route('/like', methods: 'POST')]
    public function likeAction(Request $request,
                               PostRepository $postRepository,
                               UserRepository $userRepository,
    EntityManagerInterface $entityManager)
    {
        $like = new Like();
        /** @var Post $post */
        $post = $postRepository->find($request->request->get('post_id'));
        /** @var User $user */
        $user = $userRepository->find($request->request->get('user_id'));
        $like->setPost($post)
            ->setLikeUser($user);
        $entityManager->persist($like);
        $entityManager->flush();
        return $this->json('success');
    }
}