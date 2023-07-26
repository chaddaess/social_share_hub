<?php

namespace Container5ZH2H9h;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_4aUHTqNService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.4aUHTqN' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.4aUHTqN'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'userDb' => ['privates', 'App\\Repository\\UserRepository', 'getUserRepositoryService', true],
        ], [
            'userDb' => 'App\\Repository\\UserRepository',
        ]);
    }
}
