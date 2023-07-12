<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MyController extends AbstractController
{
    #[Route('/my', name: 'app_my')]
    public function index(Request $request): Response
    {
        $sess=$request->getSession();
        dd($sess->get('twitter_session'));
        return $this->render('test/index.html.twig');
    }
}

