<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use League\OAuth2\Client\Provider\LinkedIn;


class LinkedinLoginController extends AbstractController
{

    private LinkedIn $provider;
    public function __construct(){
        $this->provider = new LinkedIn([
            'clientId'          => $_ENV['LINK_ID'],
            'clientSecret'      => $_ENV['LINK_SECRET'],
            'redirectUri'       => $_ENV['LINK_CALLBACK'],
            'graphApiVersion'   => 'v15.0',
        ]);
    }
    #[Route('/linkedin/login', name: 'app_linkedin_login')]
    public function index(): Response
    {
        $options = [
            'state' => 'OPTIONAL_CUSTOM_CONFIGURED_STATE',
            'scope' => ['r_liteprofile','r_emailaddress'] // array or string
        ];
        $helper_url=$this->provider->getAuthorizationUrl();
        $wrong_redirection_link="http%3A%2F%2Flocalhost%3A8000%2F%2Flinkedin-callback"; //as altered by the navigator
        $correct_redirection_link="http://localhost:8000/linkedin-callback"; //as submitted in the LinkedIn developer page as an authorized redirection url
        //we need to modify the link and insert  the correct redirection url
        //so that it matches the url  submitted in the LinkedIn developer page
        $helper_url_modified=str_replace($wrong_redirection_link,$correct_redirection_link,$helper_url);
        return $this->redirect($helper_url_modified);
    }
}
