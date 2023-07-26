<?php

namespace ContainerXxnyntz;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_Arvz36zService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private '.service_locator.Arvz36z' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.Arvz36z'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'doctrine' => ['services', 'doctrine', 'getDoctrineService', false],
            'repository' => ['privates', 'App\\Repository\\UserRepository', 'getUserRepositoryService', true],
            'slugger' => ['privates', 'slugger', 'getSluggerService', true],
        ], [
            'doctrine' => '?',
            'repository' => 'App\\Repository\\UserRepository',
            'slugger' => '?',
        ]);
    }
}
