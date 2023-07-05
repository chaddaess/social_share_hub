<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\PostType;
use App\Repository\UserRepository;
use Doctrine\Persistence\ManagerRegistry as ManagerRegistryAlias;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostContentController extends AbstractController
{
    #[Route('/post', name: 'app_post_content')]
    public function index(Request $request, ManagerRegistryAlias $doctrine,UserRepository $repository)
    {
        $session=$request->getSession();
        if($session->has('facebook_user')){
            $choices[$session->get('facebook_user_picture')]='facebook';
        }
        if($session->has('twitter_user')){
            $choices[$session->get('twitter_user_picture')]='twitter';
        }
        if($session->has('linkedin_user')){
            $choices[$session->get('linkedin_user_picture')]='linkedin';
        }


        $post=new Post();
        $form=$this->createForm(PostType::class,$post,[

            'postedOn'=>$choices,
        ]);


        $form->handleRequest($request);
        if($form->isSubmitted()){
            //save the post to database
            $currentTimeStamp=new \DateTime();
            $post->setPostTime($currentTimeStamp);
            $user=$repository->findOneBy(['email'=>$session->get('user_email')]);
            $post->setUser($user);
            $manager=$doctrine->getManager();
            $manager->persist($post);
            $manager->flush();
            $socialsArray=($form->getData()->getPostedOn());
            $text=$form->getData()->getTextContent();
            //make api calls to every social media in $socialsArray to post $text
            return ($this->redirectToRoute("app_social_media"));
        }
        else{

            return $this->render('post_content/index.html.twig', [
                'form'=>$form->createView(),

            ]);
        }


    }
}
