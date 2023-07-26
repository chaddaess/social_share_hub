<?php

namespace App\Controller;

use KnpU\OAuth2ClientBundle\Client\ClientRegistry;
use KnpU\OAuth2ClientBundle\Client\Provider\GoogleClient;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use League\OAuth2\Client\Provider\GoogleUser;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class GoogleController extends AbstractController
{
    // lookup https://github.com/knpuniversity/oauth2-client-bundle for additional information about the flow
    #[Route("/connect/google", name: 'connect_google_start')]
    /**
     * Redirects to the Google authentication page
     */
    public function connectAction(ClientRegistry $clientRegistry)
    {

        // will redirect to Google
        return $clientRegistry
            ->getClient('google') // key used in config/packages/knpu_oauth2_client.yaml
            ->redirect();
    }
    #[Route("/connect/google/check", name: 'connect_google_check')]
    public function connectCheckAction(Request $request, ClientRegistry $clientRegistry)
    {
        //this method is blank because we will authenticate the user
        //using symfony's authenticator later on
        //NOTE:do NOT delete this function as that will break the OAuth2.0 flow
    }
}