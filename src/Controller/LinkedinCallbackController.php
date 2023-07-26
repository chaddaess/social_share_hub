<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use League\OAuth2\Client\Provider\LinkedIn;
use OpenApi\Annotations as OA;
class LinkedinCallbackController extends AbstractController
{
    private LinkedIn $provider;

    public function __construct()
    {
        //will be used to generate the access token later
        $this->provider = new LinkedIn([
            'clientId' => $_ENV['LINK_ID'],
            'clientSecret' => $_ENV['LINK_SECRET'],
            'redirectUri' => $_ENV['LINK_CALLBACK'],
        ]);
    }

    #[Route('/linkedin-callback', name: 'app_linkedin_callback',methods: "GET")]
    /**
     * @OA\Get(
     *     path="/linkedin-callback",
     *     tags={"SocialMedia authentication"},
     *     summary="Generates an access token and authenticates user to their Twitter account",
     *     @OA\Parameter(
     *        name="code",
     *        in="query",
     *        description="Authorization code obtained from linkedin/login"
     *      ),
     *     @OA\Response(
     *         response=200,
     *         description="OK,user authenticated to Linkedin successfully,redirects to /socialmedia with the user's profile picture",
     *     ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad request,redirects to/socialmedia with an error message"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthorized:invalid or expired token,redirects to/socialmedia with an error message"
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden:missing permissions,redirects to/socialmedia with an error message"
     *      ),
     *      @OA\Response(
     *          response=429,
     *          description="Too many requests:redirects to/socialmedia with an error message"
     *      ),
     *     @OA\Response(
     *          response=500,
     *          description="Internal server error:redirects to/socialmedia with an error message"
     *      ),
     * )
     */

    public function index(UserRepository $userDb, EntityManagerInterface $manager, Request $request): Response
    {
        try {
            //building the access token
            $accessToken = $this->provider->getAccessToken('authorization_code', [
                //authorization code obtained upon redirecting from linkedin/login
                'code' => $_GET['code']
            ]);
            //get user's complete info
            $user = $this->provider->getResourceOwner($accessToken);
            //get the user's picture by calling the Linkedin API
            $apiUrl = "https://api.linkedin.com/v2/me?projection=(id,profilePicture(displayImage~:playableStreams))";
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $apiUrl);
            curl_setopt($ch, CURLOPT_HTTPHEADER, ["Authorization: Bearer $accessToken"]);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close($ch);
            $data = json_decode($response, true);
            $profilePictureUrl = $data["profilePicture"]["displayImage~"]["elements"][0]["identifiers"][0]["identifier"];
            //add Linkedin account info to the database
            $session = $request->getSession();
            $user_connected = $userDb->findOneBy(['email' => $session->get('user_email')]);
            $user_connected->setLinkedinId($user->getId());
            $user_connected->setLinkedinPicture($profilePictureUrl);
            $user_connected->setLinkedinExpirationTime($accessToken->getExpires());
            $user_connected->setLinkedinToken($accessToken->getToken());
            $manager->persist($user_connected);
            $manager->flush();
            //add basic Linkedin account info to the session
            //to avoid too many database requests in the future
            $linkedin_session = [
                'user' => $user,
                'picture' => $profilePictureUrl,
                'token' => $accessToken,

            ];
            $session->set('linkedin_session', $linkedin_session);
            return ($this->redirectToRoute('app_social_media'));
        } catch (\ErrorException) {
            return ($this->redirectToRoute('app_social_media'));
        } catch (\Exception $e) {
            return ($this->redirectToRoute('app_social_media', [
                'linkedin_connect_error' => "❌ Could not connect to linkedin,please try again later"
            ]));
        }
    }
}
