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
    public function likeAction(Request                $request,
                               PostRepository         $postRepository,
                               UserRepository         $userRepository,
                               EntityManagerInterface $entityManager)
    {
        $like = new Like();
        /** @var Post $post */
        $post = $postRepository->find($request->request->get('post_id'));
        /** @var User $user */
        $user = $userRepository->find($request->request->get('user_id'));
        $flag = $request->request->get('like');
        $data = [];
        switch ($like){
            case 'like':
                $like->setPost($post)
                    ->setLikeUser($user);
                $entityManager->persist($like);
                $postId = $post->getId();
                $entityManager->flush();
                $data = ['postId' => $postId, 'result' => 'success'];
                break;
            case 'dislike':
                $postId = $post->getId();
                $entityManager->remove($post);
                $entityManager->flush();
                $data = ['postId' => $postId, 'result' => 'success'];
                break;

        }
        return $this->json($data);
    }
}