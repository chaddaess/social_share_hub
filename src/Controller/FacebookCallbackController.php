<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use League\OAuth2\Client\Provider\Facebook;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FacebookCallbackController extends AbstractController
{
    private Facebook $provider;

    public function __construct()
    {
        $this->provider = new Facebook([
            'clientId' => $_ENV['FCB_ID'],
            'clientSecret' => $_ENV['FCB_SECRET'],
            'redirectUri' => $_ENV['FCB_CALLBACK'],
            'graphApiVersion' => 'v15.0',
        ]);
    }

    #[Route('/fcb-callback', name: 'fcb_callback')]
    public function index(UserRepository $userDb, EntityManagerInterface $manager, Request $request): Response
    {
        //get token
        try {
            $token = $this->provider->getAccessToken('authorization_code', [
                'code' => $_GET['code']
            ]);
        } catch (IdentityProviderException $e) {
        }

        try {
            //get user's complete info
            $user = $this->provider->getResourceOwner($token);
            $id = $user->getId();
            //add Facebook account to current user
            $session = $request->getSession();
            $user_connected = $userDb->findOneBy(['email' => $session->get('user_email')]);
            $user_connected->setFacebookId($user->getId());
            $manager->persist($user_connected);
            $manager->flush();
            //get user's picture
            $userPicture = "http://graph.facebook.com/$id/picture?type=large&access_token=$token";
            //set the session
            $session->set('facebook_user', $user);
            $session->set('facebook_user_picture', $userPicture);
            return ($this->redirectToRoute('app_social_media'));
        } catch (\Exception $e) {
        }

        return ($this->redirectToRoute('app_social_media'));
    }
}
