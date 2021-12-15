<?php

namespace App\Controller;

use App\Repository\SubjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @throws \Exception
     */
    #[Route('/', name: 'index')]
    public function index(SubjectRepository $subjectRepository): Response
    {
        $subs = $subjectRepository->findAll();

        return $this->render('index/index.html.twig',[
            'subs' => $subs
        ]);
    }
}
