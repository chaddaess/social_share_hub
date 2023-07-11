<?php

namespace App\Controller;

use Abraham\TwitterOAuth\TwitterOAuth;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use ErrorException;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use League\OAuth2\Client\Token\AccessToken;
use Smolblog\OAuth2\Client\Provider\Twitter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TwitterCallbackController extends AbstractController
{
    private Twitter $provider;

    public function __construct()
    {
        $this->provider = new Twitter([
            'clientId' => $_ENV['TW_ID'],
            'clientSecret' => $_ENV['TW_SECRET'],
            'redirectUri' => $_ENV['TW_CALLBACK'],
        ]);
    }

    #[Route('/twitter-callback', name: 'twitter_callback')]
    public function index(UserRepository $userDb, EntityManagerInterface $manager, Request $request): Response
    {
//        //get access token
        try {
            $token = $this->provider->getAccessToken('authorization_code', [
                'code' => $_GET['code'],
                'code_verifier' => $request->getSession()->get('verifier'),
            ]);
        } catch (IdentityProviderException $e) {
            return ($this->redirectToRoute('app_social_media', [
                'twitter_connect_error' => "⨂ Could not connect to twitter,please try again later"
            ]));
        }catch(ErrorException|\BadMethodCallException $e){
            return ($this->redirectToRoute('app_social_media'));
        }
        //use the token
        try {
            //get user's complete info
            $user = $this->provider->getResourceOwner($token);
            $userArray = $user->toArray();
            $userPicture = $userArray['profile_image_url'];
            //add Twitter account to current user
            $session = $request->getSession();
            $user_connected = $userDb->findOneBy(['email' => $session->get('user_email')]);
            $user_connected->setTwitterId($user->getId());
            $user_connected->setTwitterPicture($userPicture);
            $user_connected->setTwitterExpirationTime($token->getExpires());
            $manager->persist($user_connected);
            $manager->flush();
            //set the session
            $twitterSession=[
                'user'=>$user,
                'picture'=>$userPicture,
                'token'=>$token,
            ];
            $session->set('twitter_session',$twitterSession);
            return ($this->redirectToRoute('app_social_media'));

        } catch (\Exception $e) {
            return ($this->redirectToRoute('app_social_media', [
                'twitter_connect_error' => "⨂ Could not connect to twitter,please try again later"
            ]));
        }



    }
}
