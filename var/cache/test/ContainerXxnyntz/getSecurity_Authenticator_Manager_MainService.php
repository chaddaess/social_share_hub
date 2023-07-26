<?php

namespace ContainerXxnyntz;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getSecurity_Authenticator_Manager_MainService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private 'security.authenticator.manager.main' shared service.
     *
     * @return \Symfony\Component\Security\Http\Authentication\AuthenticatorManager
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4) . '' . \DIRECTORY_SEPARATOR . 'vendor' . \DIRECTORY_SEPARATOR . 'symfony' . \DIRECTORY_SEPARATOR . 'security-http' . \DIRECTORY_SEPARATOR . 'Authentication' . \DIRECTORY_SEPARATOR . 'AuthenticatorManagerInterface.php';
        include_once \dirname(__DIR__, 4) . '' . \DIRECTORY_SEPARATOR . 'vendor' . \DIRECTORY_SEPARATOR . 'symfony' . \DIRECTORY_SEPARATOR . 'security-http' . \DIRECTORY_SEPARATOR . 'Authentication' . \DIRECTORY_SEPARATOR . 'UserAuthenticatorInterface.php';
        include_once \dirname(__DIR__, 4) . '' . \DIRECTORY_SEPARATOR . 'vendor' . \DIRECTORY_SEPARATOR . 'symfony' . \DIRECTORY_SEPARATOR . 'security-http' . \DIRECTORY_SEPARATOR . 'Authentication' . \DIRECTORY_SEPARATOR . 'AuthenticatorManager.php';

        $a = ($container->privates['App\\Security\\MyGoogleAuthenticator'] ?? $container->load('getMyGoogleAuthenticatorService'));

        if (isset($container->privates['security.authenticator.manager.main'])) {
            return $container->privates['security.authenticator.manager.main'];
        }

        return $container->privates['security.authenticator.manager.main'] = new \Symfony\Component\Security\Http\Authentication\AuthenticatorManager([0 => $a, 1 => ($container->privates['App\\Security\\LoginAuthenticator'] ?? $container->load('getLoginAuthenticatorService'))], ($container->privates['security.token_storage'] ?? $container->getSecurity_TokenStorageService()), ($container->privates['security.event_dispatcher.main'] ?? $container->getSecurity_EventDispatcher_MainService()), 'main', ($container->privates['monolog.logger.security'] ?? $container->getMonolog_Logger_SecurityService()), true, true, []);
    }
}