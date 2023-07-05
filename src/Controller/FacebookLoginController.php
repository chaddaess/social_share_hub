<?php

namespace App\Controller;

use League\OAuth2\Client\Provider\Facebook;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FacebookLoginController extends AbstractController
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

    #[Route('/facebook/login', name: 'app_facebook_login')]
    public function index(): Response
    {
        $helper_url = $this->provider->getAuthorizationUrl();
        return $this->redirect($helper_url);
    }
}
