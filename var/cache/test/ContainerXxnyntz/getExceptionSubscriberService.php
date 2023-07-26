<?php

namespace ContainerXxnyntz;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getExceptionSubscriberService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private 'App\EventSubscriber\ExceptionSubscriber' shared autowired service.
     *
     * @return \App\EventSubscriber\ExceptionSubscriber
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4) . '' . \DIRECTORY_SEPARATOR . 'src' . \DIRECTORY_SEPARATOR . 'EventSubscriber' . \DIRECTORY_SEPARATOR . 'ExceptionSubscriber.php';

        return $container->privates['App\\EventSubscriber\\ExceptionSubscriber'] = new \App\EventSubscriber\ExceptionSubscriber(($container->services['router'] ?? $container->getRouterService()));
    }
}
