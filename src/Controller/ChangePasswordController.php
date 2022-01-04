<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class ChangePasswordController extends AbstractController
{
    #[Route('/change/password', name: 'change_password'),IsGranted('ROLE_USER')]
    public function index(): Response
    {
        return $this->render('change_password/index.html.twig', [
            'controller_name' => 'ChangePasswordController',
        ]);
    }
}
