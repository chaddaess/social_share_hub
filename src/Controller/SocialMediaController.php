<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SocialMediaController extends AbstractController
{
    #[Route('/socialmedia', name: 'app_social_media')]
    /**
     * Displays the (currently logged-in) user's social media accounts
     */
    public function index(Request $request, UserRepository $userDb): Response
    {
        $session = $request->getSession();
        //redirecting from other routes  with errors or exceptions
        $this->addFlash('unauthorized_access', $request->get('error_message'));
        $this->addFlash('success', $request->get('success-posting'));
        $facebookConnectError = $request->get('facebook_connect_error');
        $linkedinConnectError = $request->get('linkedin_connect_error');
        $twitterConnectError = $request->get('twitter_connect_error');
        $this->addFlash('connection_errors', $facebookConnectError);
        $this->addFlash('connection_errors', $linkedinConnectError);
        $this->addFlash('connection_errors', $twitterConnectError);
        if (!$session->get('user_email')) {
            // no user is currently logged in
            // redirect to login page
            return ($this->redirectToRoute('app_login'));
        }
        $currentTimestamp = (new \DateTime())->getTimestamp();
        if (!$session->get('checked')) {
            // the database is queried only on the first access to this route  after logging in
            // to improve the app's performance
            $userConnected = $userDb->findOneBy(['email' => $session->get('user_email')]);
            $facebookValid = $userConnected->getFacebookExpirationTime() >= $currentTimestamp; //TRUE if token is still valid
            $twitterValid = $userConnected->getTwitterExpirationTime() >= $currentTimestamp;
            $linkedinValid = $userConnected->getLinkedinExpirationTime() >= $currentTimestamp;
            $facebookPicture = $facebookValid ? $userConnected->getFacebookPicture() : '';
            $twitterPicture = $twitterValid ? $userConnected->getTwitterPicture() : '';
            $linkedinPicture = $linkedinValid ? $userConnected->getLinkedinPicture() : '';
            $fb = $session->get('facebook_session');
            $fb['picture'] = $facebookPicture;
            $session->set('facebook_session', $fb);
            $tw = $session->get('twitter_session');
            $tw['picture'] = $twitterPicture;
            $session->set('twitter_session', $tw);
            $link = $session->get('linkedin_session');
            $link['picture'] = $linkedinPicture;
            $session->set('linkedin_session', $link);
            $session->set('checked', true);

        } else {
            // accessing the /socialmedia route after the first time
            // get user info from the session this time to avoid unnecessary database queries
            $facebookPicture = $session->get('facebook_session')['picture'];
            $twitterPicture = $session->get('twitter_session')['picture'];
            $linkedinPicture = $session->get('linkedin_session')['picture'];

        }
        return $this->render('social_media/index.html.twig', [
            'controller_name' => 'SocialMediaController',
            'pictureLinkedin' => $linkedinPicture,
            'picture' => $facebookPicture,
            'pictureTwitter' => $twitterPicture,

        ]);

    }
}
