<?php

namespace App\Security;

use App\Entity\User;

// your user entity
use Doctrine\ORM\EntityManagerInterface;
use KnpU\OAuth2ClientBundle\Client\ClientRegistry;
use KnpU\OAuth2ClientBundle\Security\Authenticator\OAuth2Authenticator;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Http\Authenticator\Passport\SelfValidatingPassport;
use Symfony\Component\Security\Http\EntryPoint\AuthenticationEntryPointInterface;

class MyGoogleAuthenticator extends OAuth2Authenticator implements AuthenticationEntrypointInterface
{
    private $clientRegistry;
    private $entityManager;
    private $router;
    private $urlGenerator;


    public function __construct(ClientRegistry $clientRegistry, EntityManagerInterface $entityManager, RouterInterface $router, UrlGeneratorInterface $urlGenerator)
    {
        $this->clientRegistry = $clientRegistry;
        $this->entityManager = $entityManager;
        $this->router = $router;
        $this->urlGenerator = $urlGenerator;
    }

    public function supports(Request $request): ?bool
    {
        return $request->attributes->get('_route') === 'connect_google_check';
    }

    public function authenticate(Request $request): Passport
    {
        $client = $this->clientRegistry->getClient('google');
        $accessToken = $this->fetchAccessToken($client);

        return new SelfValidatingPassport(
            new UserBadge($accessToken->getToken(), function () use ($request, $accessToken, $client) {
                /** @var googleUser $googleUser */
                $googleUser = $client->fetchUserFromToken($accessToken);

                $email = $googleUser->getEmail();

                $existingUser = $this->entityManager->getRepository(User::class)->findOneBy(['googleId' => $googleUser->getId()]);
                $session = $request->getSession();
                $session->set('user_email', $email);
                if ($existingUser) {
                    return $existingUser;
                }

                $user = $this->entityManager->getRepository(User::class)->findOneBy(['email' => $email]);

                if (!$user) {
                    $user = new User();
                    $user->setgoogleId($googleUser->getId());
                    $user->setEmail($googleUser->getEmail());
                    $this->entityManager->persist($user);
                    $this->entityManager->flush();
                } else {
                    $user->setgoogleId($googleUser->getId());
                }
                return $user;
            })
        );

    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        $targetUrl = $this->router->generate('app_social_media');
        $request->getSession()->set('checked', false);
        return new RedirectResponse($targetUrl);
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception): ?Response
    {
        $redirectUrl = $this->urlGenerator->generate('app_login');
        return new RedirectResponse($redirectUrl);
    }

    /**
     * Called when authentication is needed, but it's not sent.
     * This redirects to the 'login'.
     */
    public function start(Request $request, AuthenticationException $authException = null): Response
    {
        return new RedirectResponse(
            '/connect/', // might be the site, where users choose their oauth provider
            Response::HTTP_TEMPORARY_REDIRECT
        );
    }
}

