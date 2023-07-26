<?php

namespace ContainerCqYfIDS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getKnpu_Oauth2_Client_GoogleService extends App_KernelTestDebugContainer
{
    /**
     * Gets the public 'knpu.oauth2.client.google' shared service.
     *
     * @return \KnpU\OAuth2ClientBundle\Client\Provider\GoogleClient
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'knpuniversity'.\DIRECTORY_SEPARATOR.'oauth2-client-bundle'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Client'.\DIRECTORY_SEPARATOR.'OAuth2ClientInterface.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'knpuniversity'.\DIRECTORY_SEPARATOR.'oauth2-client-bundle'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Client'.\DIRECTORY_SEPARATOR.'OAuth2Client.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'knpuniversity'.\DIRECTORY_SEPARATOR.'oauth2-client-bundle'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Client'.\DIRECTORY_SEPARATOR.'Provider'.\DIRECTORY_SEPARATOR.'GoogleClient.php';

        return $container->services['knpu.oauth2.client.google'] = new \KnpU\OAuth2ClientBundle\Client\Provider\GoogleClient(($container->privates['knpu.oauth2.provider.google'] ?? $container->load('getKnpu_Oauth2_Provider_GoogleService')), ($container->services['request_stack'] ?? ($container->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())));
    }
}
