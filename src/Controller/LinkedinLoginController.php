<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use League\OAuth2\Client\Provider\LinkedIn;


class LinkedinLoginController extends AbstractController
{
    // lookup https://github.com/thephpleague/oauth2-linkedin for additional information about the flow
    private LinkedIn $provider;
    public function __construct()
    {
        //will be used to generate the authorization code later
        $this->provider = new LinkedIn([
            'clientId' => $_ENV['LINK_ID'],
            'clientSecret' => $_ENV['LINK_SECRET'],
            'redirectUri' => $_ENV['LINK_CALLBACK'],
        ]);
    }
    #[Route('/linkedin/login', name: 'app_linkedin_login')]
    /**
     * Generates the LinkedIn authorization code and redirects user
     * to the LinkedIn authentication page
     */
    public function index(): Response
    {
        //require LinkedIn permissions
        $options = [
            'state' => 'OPTIONAL_CUSTOM_CONFIGURED_STATE',
            'scope' => ['r_liteprofile', 'r_emailaddress', 'w_member_social']
        ];
        $helper_url = $this->provider->getAuthorizationUrl($options);
        $wrong_redirection_link = "http%3A%2F%2Flocalhost%3A8000%2F%2Flinkedin-callback";
        $correct_redirection_link = urldecode("http%3A%2F%2Flocalhost%3A8000%2F%2Flinkedin-callback");
        //it is necessary to http  decode the redirection uri
        //so it matches the authorized redirection uri indicated
        // in the app settings @ LinkedIn for developers
        $helper_url_modified = str_replace($wrong_redirection_link, $correct_redirection_link, $helper_url);
        return $this->redirect($helper_url_modified);
    }
}
