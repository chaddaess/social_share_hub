<?php

namespace App\Controller;

use App\Repository\PostRepository;
use App\Repository\UserRepository;
use Doctrine\Persistence\ManagerRegistry;
use DOMDocument;
use http\Exception\RuntimeException;
use mysql_xdevapi\Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostArchiveController extends AbstractController
{
    #[Route('/archive', name: 'app_post_archive')]
    public function index(ManagerRegistry $doctrine,PostRepository $postRepository,Request $request,UserRepository $userRepository): Response
    {
        $session=$request->getSession();
        if(!$session->has('user_email'))
        {
            return ($this->redirectToRoute('app_login'));
        }
        $current_user=$userRepository->findOneBy(['email'=>$session->get('user_email')]);
        $posts=$postRepository->findBy(['user'=>$current_user]);
        return $this->render('post_archive/index.html.twig', [
            'posts'=>$posts
        ]);
    }

}
