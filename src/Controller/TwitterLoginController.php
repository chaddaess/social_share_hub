<?php

namespace App\Controller;

use Abraham\TwitterOAuth\TwitterOAuth;
use Abraham\TwitterOAuth\TwitterOAuthException;
use Smolblog\OAuth2\Client\Provider\Twitter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TwitterLoginController extends AbstractController
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

    #[Route('/twitter/login', name: 'app_twitter_login')]
    public function index(Request $request): Response
    {
        $options = [
            'scope' => [
                'tweet.read',
                'tweet.write',
                'users.read',
                'offline.access',

            ],
        ];
        $helper_url = $this->provider->getAuthorizationUrl($options);
        $wrong_redirection_link = "http%3A%2F%2Flocalhost%3A8000%2Ftwitter-callback";
        $correct_redirection_link = urldecode($wrong_redirection_link);
        $helper_url_modified = str_replace($wrong_redirection_link, $correct_redirection_link, $helper_url);
        $session = $request->getSession();
        $session->set('verifier', $this->provider->getPkceVerifier());
        return $this->redirect($helper_url_modified);

    }

}
