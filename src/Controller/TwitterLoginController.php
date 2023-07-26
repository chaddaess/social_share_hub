<?php

namespace App\Controller;


use Smolblog\OAuth2\Client\Provider\Twitter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TwitterLoginController extends AbstractController
{
    // lookup https://github.com/smolblog/oauth2-twitter for additional information about the flow
    private Twitter $provider;
    public function __construct()
    {   //will be used to generate the authorization code later
        $this->provider = new Twitter([
            'clientId' => $_ENV['TW_ID'],
            'clientSecret' => $_ENV['TW_SECRET'],
            'redirectUri' => $_ENV['TW_CALLBACK'],
        ]);
    }
    #[Route('/twitter/login', name: 'app_twitter_login')]
    public function index(Request $request): Response
    {
        //require twitter permissions
        $options = [
            'scope' => [
                'tweet.read',
                'tweet.write',
                'users.read',
                'offline.access',

            ],
        ];
        $helperUrl = $this->provider->getAuthorizationUrl($options);
        $wrongRedirectionLink = "http%3A%2F%2Flocalhost%3A8000%2Ftwitter-callback";
        $correctRedirectionLink = urldecode($wrongRedirectionLink);
        //it is necessary to http  decode the redirection uri
        //so it matches the authorized redirection uri indicated
        // in the app settings @ twitter for developers
        $helperUrlModified = str_replace($wrongRedirectionLink, $correctRedirectionLink, $helperUrl);
        $session = $request->getSession();
        //verifier will be used to generate the access token later on
        $session->set('verifier', $this->provider->getPkceVerifier());
        return $this->redirect($helperUrlModified);

    }
}
