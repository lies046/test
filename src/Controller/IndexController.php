<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(PostRepository $postRepository): Response
    {

        $postList = $postRepository->findBy(['status' => 1]);
        $test = $postRepository->findByTest();
        dd($test);
        return $this->render('index/index.html.twig', [
            'postList' => $postList
        ]);
    }
}
