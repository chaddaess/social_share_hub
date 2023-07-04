<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

class SocialMediaController extends AbstractController
{
    #[Route('/socialmedia', name: 'app_social_media')]
    public function index(Request $request): Response
    {

        $session = $request->getSession();
        if (!$session->get('user_email')) {
            return ($this->redirectToRoute('app_login'));

        }
        $facebookUser = $session->get('facebook_user');
        $linkedinUser = $session->get('linkedin_user');
        $twitterUser = $session->get('twitter_user');
        $facebookPicture = $facebookUser ? $session->get('facebook_user_picture') : '';
        $linkedinPicture = $linkedinUser ? $session->get('linkedin_user_picture') : '';
        $twitterUserPicture = $twitterUser ? $session->get('twitter_user_picture') : '';
        return $this->render('social_media/index.html.twig', [
            'controller_name' => 'SocialMediaController',
            'pictureLinkedin' => $linkedinPicture,
            'picture' => $facebookPicture,
            'pictureTwitter' => $twitterUserPicture,

        ]);
    }
}
