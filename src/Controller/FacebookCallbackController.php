<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use ErrorException;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use League\OAuth2\Client\Provider\Facebook;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use OpenApi\Annotations as OA;
class FacebookCallbackController extends AbstractController
{
    private Facebook $provider;

    public function __construct()
    {
        //will be used to generate the access token later
        $this->provider = new Facebook([
            'clientId' => $_ENV['FCB_ID'],
            'clientSecret' => $_ENV['FCB_SECRET'],
            'redirectUri' => $_ENV['FCB_CALLBACK'],
            'graphApiVersion' => 'v15.0',
        ]);
    }

    #[Route('/fcb-callback', name: 'fcb_callback',methods:"GET" )]
    /**
     * Generates an access token and authenticates user to their Facebook account
     * @OA\Get(
     *     path="/fcb-callback",
     *     tags={"SocialMedia authentication"},
     *     summary="Generates an access token and authenticates user to their Facebook account",
     *     @OA\Parameter(
     *      name="code",
     *       in="query",
     *      description="Authorization code obtained from facebook/login"
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK,user authenticated to Facebook successfully,redirects to /socialmedia with the user's profile picture",
     *         headers={}
     *     )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad request,redirects to/socialmedia with an error message"
     *     ),
     *     @OA\Response(
     *         response=190,
     *         description="OAuth exception:invalid or expired token,redirects to/socialmedia with an error message"
     *     ),
     *      @OA\Response(
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
                //authorization code obtained upon redirecting from facebook/login
                'code' => $_GET['code']
            ]);
        } catch (ErrorException|\BadMethodCallException $e) {
            //ill formed request
            return ($this->redirectToRoute('app_social_media'));
        } catch (IdentityProviderException $e) {
            //correct request,expired or wrong authorization code
            return ($this->redirectToRoute('app_social_media', [
                'facebook_connect_error' => "⨂ Could not connect to facebook,please try again later"
            ]));
        }

        try {
            //get user's complete info
            $user = $this->provider->getResourceOwner($token);
            $id = $user->getId();
            $userPicture = "http://graph.facebook.com/$id/picture?type=large&access_token=$token";
            //add Facebook account info to the database
            $session = $request->getSession();
            $user_connected = $userDb->findOneBy(['email' => $session->get('user_email')]);
            $user_connected->setFacebookId($user->getId());
            $user_connected->setFacebookPicture($userPicture);
            $user_connected->setFacebookExpirationTime($token->getExpires());
            $manager->persist($user_connected);
            $manager->flush();
            //add basic Facebook account info to the session
            //to avoid too many database requests in the future
            $facebookSession = [
                'user' => $user,
                'picture' => $userPicture,
                'token' => $token,
            ];
            $session->set('facebook_session', $facebookSession);
            return ($this->redirectToRoute('app_social_media'));
        } catch (\ErrorException) {
            return ($this->redirectToRoute('app_social_media'));
        } catch (\Exception $e) {
            return ($this->redirectToRoute('app_social_media', [
                'facebook_connect_error' => "❌ Could not connect to facebook,please try again later"
            ]));
        }

    }
}
