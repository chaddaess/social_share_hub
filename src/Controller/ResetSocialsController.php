<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ResetSocialsController extends AbstractController
{
    #[Route('/reset-socials/facebook', name: 'app_reset_socials_facebook')]
    public function resetFacebook(UserRepository $repository,EntityManagerInterface $manager,Request $request): Response
    {
        $session=$request->getSession();
        $user_connected = $repository->findOneBy(['email' => $session->get('user_email')]);
        $user_connected->setFacebookId(null);
        $user_connected->setFacebookPicture('');
        $user_connected->setFacebookExpirationTime(null);
        $manager->persist($user_connected);
        $manager->flush();
        $session->set('facebook_session',['picture'=>'']);
        return ($this->redirectToRoute('app_social_media'));
    }
    #[Route('/reset-socials/linkedin', name: 'app_reset_socials_linkedin')]
    public function resetLinkedin(UserRepository $repository,EntityManagerInterface $manager,Request $request): Response
    {
        $session=$request->getSession();
        $user_connected = $repository->findOneBy(['email' => $session->get('user_email')]);
        $user_connected->setLinkedinId(null);
        $user_connected->setLinkedinPicture('');
        $user_connected->setLinkedinExpirationTime(null);
        $manager->persist($user_connected);
        $manager->flush();
        $session->set('linkedin_session',['picture'=>'']);
        return ($this->redirectToRoute('app_social_media'));
    }
    #[Route('/reset-socials/twitter', name: 'app_reset_socials_twitter')]
    public function resetTwitter(UserRepository $repository,EntityManagerInterface $manager,Request $request): Response
    {
        $session=$request->getSession();
        $user_connected = $repository->findOneBy(['email' => $session->get('user_email')]);
        $user_connected->setTwitterId(null);
        $user_connected->setTwitterPicture('');
        $user_connected->setTwitterExpirationTime(null);
        $manager->persist($user_connected);
        $manager->flush();
        $session->set('twitter_session',['picture'=>'']);
        return ($this->redirectToRoute('app_social_media'));
    }
}
