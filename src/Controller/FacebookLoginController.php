<?php

namespace App\Controller;

use League\OAuth2\Client\Provider\Facebook;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FacebookLoginController extends AbstractController
{
    // lookup https://github.com/thephpleague/oauth2-facebook for additional information about the flow
    private Facebook $provider;

    public function __construct()
    {
        //will be used to generate the authorization code later
        $this->provider = new Facebook([
            'clientId' => $_ENV['FCB_ID'],
            'clientSecret' => $_ENV['FCB_SECRET'],
            'redirectUri' => $_ENV['FCB_CALLBACK'],
            //NOTE:do NOT remove this line
            //otherwise the authorization code will be broken
            'graphApiVersion' => 'v15.0',
        ]);
    }

    #[Route('/facebook/login', name: 'app_facebook_login')]
    /**
     * Generates the Facebook authorization code and redirects user
     * to the Facebook authentication page
     */
    public function index(): Response
    {
        //require facebook permissions
        $options = [
            'scope' => ['email', 'public_profile']
        ];
        $helper_url = $this->provider->getAuthorizationUrl($options);
        return $this->redirect($helper_url);
    }
}
