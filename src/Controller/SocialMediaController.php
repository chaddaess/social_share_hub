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
        $postError=$request->get('error_message');
        $this->addFlash('unauthorized_access',$postError);
        $session = $request->getSession();
        if (!$session->get('user_email')) {
            return ($this->redirectToRoute('app_login'));

        }
        $facebookUser = $session->get('facebook_session')?$session->get('facebook_session')['user']:null;
        $linkedinUser = $session->get('linkedin_session')?$session->get('linkedin_session')['user']:null;
        $twitterUser = $session->get('twitter_session')?$session->get('twitter_session')['user']:null;
        $facebookPicture = $facebookUser ? $session->get('facebook_session')['picture'] : '';
        $linkedinPicture = $linkedinUser ? $session->get('linkedin_session')['picture'] : '';
        $twitterUserPicture = $twitterUser ? $session->get('twitter_session')['picture'] : '';
        return $this->render('social_media/index.html.twig', [
            'controller_name' => 'SocialMediaController',
            'pictureLinkedin' => $linkedinPicture,
            'picture' => $facebookPicture,
            'pictureTwitter' => $twitterUserPicture,

        ]);
    }
}
