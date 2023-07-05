<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\PostType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostContentController extends AbstractController
{
    #[Route('/post', name: 'app_post_content')]
    public function index(Request $request): Response
    {
        $session=$request->getSession();
        if($session->has('facebook_user')){
            $choices['facebook']=$session->get('facebook_user_picture');
        }
        if($session->has('twitter_user')){
            $choices['twitter']=$session->get('twitter_user_picture');
        }
        if($session->has('linkedin_user')){
            $choices['linkedin']=$session->get('linkedin_user_picture');
        }


        $post=new Post();
        $form=$this->createForm(PostType::class,$post,[

            'postedOn'=>$choices,
        ]);

        return $this->render('post_content/index.html.twig', [
                'form'=>$form->createView(),

        ]);
    }
}
