<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use League\OAuth2\Client\Token\AccessToken;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use League\OAuth2\Client\Provider\LinkedIn;


class LinkedinCallbackController extends AbstractController
{
    private LinkedIn $provider;

    public function __construct()
    {
        $this->provider = new LinkedIn([
            'clientId' => $_ENV['LINK_ID'],
            'clientSecret' => $_ENV['LINK_SECRET'],
            'redirectUri' => $_ENV['LINK_CALLBACK'],
        ]);
    }

    #[Route('/linkedin-callback', name: 'app_linkedin_callback')]
    public function index(UserRepository $userDb, EntityManagerInterface $manager, Request $request): Response
    {


        try {
            $accessToken = $this->provider->getAccessToken('authorization_code', [
                'code' => $_GET['code']
            ]);
            //get user's complete info

            $user = $this->provider->getResourceOwner($accessToken);
            $email = $user->getEmail();//this is returning null for some reason
            //to get the user's picture
            // Set the API endpoint and access token
            $apiUrl = "https://api.linkedin.com/v2/me?projection=(id,profilePicture(displayImage~:playableStreams))";
            // Initialize a cURL session
            $ch = curl_init();
            // Set the cURL options
            curl_setopt($ch, CURLOPT_URL, $apiUrl);
            curl_setopt($ch, CURLOPT_HTTPHEADER, ["Authorization: Bearer $accessToken"]);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            // Execute the cURL request and get the response
            $response = curl_exec($ch);
            // Close the cURL session
            curl_close($ch);
            // Parse the response
            $data = json_decode($response, true);
            // Get the URL of the profile picture
            $profilePictureUrl = $data["profilePicture"]["displayImage~"]["elements"][0]["identifiers"][0]["identifier"];
            //add Linkedin account to the current user
            $session = $request->getSession();
            $user_connected = $userDb->findOneBy(['email' => $session->get('user_email')]);
            $user_connected->setLinkedinId($user->getId());
            $user_connected->setLinkedinPicture($profilePictureUrl);
            $user_connected->setLinkedinExpirationTime($accessToken->getExpires());
            $manager->persist($user_connected);
            $manager->flush();
            //set the session
            $linkedin_session=[
                'user'=>$user,
                'picture'=>$profilePictureUrl,
                'token'=>$accessToken,

            ];
            $session->set('linkedin_session',$linkedin_session);
//            $session->set('linkedin_user_picture', $profilePictureUrl);
//            $session->set('linkedin_user', $user);
            return ($this->redirectToRoute('app_social_media'));
        } catch (\Exception $e) {
            dd("hehe catch");
        }
        return ($this->redirectToRoute('app_social_media'));
    }
}
