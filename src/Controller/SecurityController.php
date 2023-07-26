<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    // uses Symfony's Security bundle
    // lookup Symfony's official documentation https://symfony.com/doc/current/security.html for more information
    #[Route(path: '/login', name: 'app_login')]
    /**
     * Logs user in to their account
     */
    public function login(AuthenticationUtils $authenticationUtils, Request $request): Response
    {
        $session = $request->getSession();
        if ($session->get('user_email')) {
            // someone is already logged-in
            return ($this->redirectToRoute('app_social_media'));
        }
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();
        $postErrorMessage = $request->get('error_message');
        $this->addFlash('unauthorized_access', $postErrorMessage);
        $request->getSession()->set('checked', false);
        return $this->render('security/login.html.twig',
            [
                'last_username' => $lastUsername,
                'error' => $error,
                'method' => "sign in",
                'url' => "connect_google_start",
                'upOrIn' => "in"

            ]);
    }
    #[Route(path: '/logout', name: 'app_logout')]
    /**
     * Logs user out of their account
     */
    public function logout(): void
    {

        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
