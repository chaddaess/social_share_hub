<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use ErrorException;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use Smolblog\OAuth2\Client\Provider\Twitter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use OpenApi\Annotations as OA;

class TwitterCallbackController extends AbstractController
{
    private Twitter $provider;

    public function __construct()
    {
        //will be used to generate the access token later
        $this->provider = new Twitter([
            'clientId' => $_ENV['TW_ID'],
            'clientSecret' => $_ENV['TW_SECRET'],
            'redirectUri' => $_ENV['TW_CALLBACK'],
        ]);
    }
    #[Route('/twitter-callback', name: 'twitter_callback',methods:"GET")]
    /**
     * @OA\Get(
     *     path="/twitter-callback",
     *     tags={"SocialMedia authentication"},
     *     summary="Generates an access token and authenticates user to their Twitter account",
     * ),
     *      @OA\Parameter(
     *        name="code",
     *        in="query",
     *        description="Authorization code obtained from twitter/login"
     *      ),
     *     @OA\Response(
     *         response=200,
     *         description="OK,user authenticated to Twitter successfully,redirects to /socialmedia with the user's profile picture",
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
     *          description="Internal server error"
     *      ),
     * )
     */

    public function index(UserRepository $userDb, EntityManagerInterface $manager, Request $request): Response
    {
        try {
            //building the access token
            $token = $this->provider->getAccessToken('authorization_code', [
                //authorization code obtained upon redirecting from twitter/login
                'code' => $_GET['code'],
                'code_verifier' => $request->getSession()->get('verifier'),
            ]);
        } catch (IdentityProviderException $e) {
            //correct request,expired/wrong authorization code or verifier
            return ($this->redirectToRoute('app_social_media', [
                'twitter_connect_error' => "⨂ Could not connect to twitter,please try again later"
            ]));
        } catch (ErrorException|\BadMethodCallException $e) {
            //ill formed request
            return ($this->redirectToRoute('app_social_media'));
        }
        try {
            $session = $request->getSession();
            //get user's complete info
            $user = $this->provider->getResourceOwner($token);
            $userArray = $user->toArray();
            $userPicture = $userArray['profile_image_url'];
            //add Twitter account info to the database
            $user_connected = $userDb->findOneBy(['email' => $session->get('user_email')]);
            $user_connected->setTwitterId($user->getId());
            $user_connected->setTwitterPicture($userPicture);
            $user_connected->setTwitterExpirationTime($token->getExpires());
            $user_connected->setTwitterToken($token->getToken());
            $manager->persist($user_connected);
            $manager->flush();
            //add basic Twitter account info to the session
            //to avoid too many database requests in the future
            $twitterSession = [
                'user' => $user,
                'picture' => $userPicture,
                'token' => $token,
            ];
            $session->set('twitter_session', $twitterSession);
            return ($this->redirectToRoute('app_social_media'));
        } catch (\Exception $e) {
            return ($this->redirectToRoute('app_social_media', [
                'twitter_connect_error' => "❌ Could not connect to twitter,please try again later"
            ]));
        }
    }
}