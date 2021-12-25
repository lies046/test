<?php

namespace App\Controller;

use App\Entity\Subject;
use App\Repository\SubjectRepository;
use Doctrine\ORM\EntityManager;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/test')]
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

    #[Route('/test', name: 'test', methods: 'GET')]
    public function test(Request $request, PaginatorInterface $paginator, SubjectRepository $subjectRepository): Response
    {
       $pagination = $paginator->paginate(
           $subjectRepository->getquery(),
           $request->query->getInt('page', 1),
           2
       );
       return $this->render('index/test.html.twig',['pagination' => $pagination]);
    }
}
