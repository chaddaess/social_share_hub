<?php

namespace ContainerXxnyntz;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getKnpu_Oauth2_ProviderFactoryService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private 'knpu.oauth2.provider_factory' shared service.
     *
     * @return \KnpU\OAuth2ClientBundle\DependencyInjection\ProviderFactory
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4) . '' . \DIRECTORY_SEPARATOR . 'vendor' . \DIRECTORY_SEPARATOR . 'knpuniversity' . \DIRECTORY_SEPARATOR . 'oauth2-client-bundle' . \DIRECTORY_SEPARATOR . 'src' . \DIRECTORY_SEPARATOR . 'DependencyInjection' . \DIRECTORY_SEPARATOR . 'ProviderFactory.php';

        return $container->privates['knpu.oauth2.provider_factory'] = new \KnpU\OAuth2ClientBundle\DependencyInjection\ProviderFactory(($container->services['router'] ?? $container->getRouterService()));
    }
}
