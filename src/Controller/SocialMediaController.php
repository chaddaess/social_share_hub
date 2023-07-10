<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

class SocialMediaController extends AbstractController
{
    #[Route('/socialmedia', name: 'app_social_media')]
    public function index(Request $request ,UserRepository $userDb): Response
    {
        $session=$request->getSession();
        $postError=$request->get('error_message');
        $this->addFlash('unauthorized_access',$postError);
        if (!$session->get('user_email')) {
            return ($this->redirectToRoute('app_login'));

        }
        $currentTimestamp = new \DateTime('now');

        if(!$session->get('checked')){
            //first time accessing the route
            $user_connected = $userDb->findOneBy(['email' => $session->get('user_email')]);
            $facebook_valid=$user_connected->getFacebookExpirationTime()>=$currentTimestamp; //TRUE of token is valid
            $twitter_valid=$user_connected->getTwitterExpirationTime()>=$currentTimestamp;
            $linkedin_valid=$user_connected->getLinkedinExpirationTime()>=$currentTimestamp;
            $facebookPicture=$facebook_valid?'':$user_connected->getFacebookPicture();
            $twitterPicture=$twitter_valid?'':$user_connected->getTwitterPicture();
            $linkedinPicture=$linkedin_valid?'':$user_connected->getLinkedinPicture();
            $fb=$session->get('facebook_session');
            $fb['picture']=$facebookPicture;
            $session->set('facebook_session',$fb);
            $tw=$session->get('twitter_session');
            $tw['picture']=$twitterPicture;
            $session->set('twitter_session',$tw);
            $link=$session->get('linkedin_session');
            $link['picture']=$linkedinPicture;
            $session->set('linkedin_session',$link);

            $session->set('checked',true);

        }
        else{
            //accessing the route another time
            $facebookPicture =$session->get('facebook_session')['picture'];
            $twitterPicture =$session->get('twitter_session')['picture'];
            $linkedinPicture=$session->get('linkedin_session')['picture'];


        }
        return $this->render('social_media/index.html.twig', [
            'controller_name' => 'SocialMediaController',
            'pictureLinkedin' => $linkedinPicture,
            'picture' => $facebookPicture,
            'pictureTwitter' => $twitterPicture,

        ]);

    }
}
