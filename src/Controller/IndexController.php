<?php

namespace App\Controller;

use App\Entity\Subject;
use App\Repository\SubjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @throws \Exception
     */
    #[Route('/', name: 'index')]
    public function index(Request $request,SubjectRepository $subjectRepository): Response
    {
        //0かクエリの数値の最大数がセットされる
        $offset = max(0, $request->query->getInt('offset'));
        $subs = $subjectRepository->getPagination($offset);


//        $subs = $subjectRepository->findAll();

        return $this->render('index/index.html.twig',[
//            'subject' => $subject,
            'subs' => $subs,
            'previous' => $offset - SubjectRepository::PAGINATOR_PER_PAGE,
            'next' => min(count($subs), $offset + SubjectRepository::PAGINATOR_PER_PAGE)
        ]);
    }
}
