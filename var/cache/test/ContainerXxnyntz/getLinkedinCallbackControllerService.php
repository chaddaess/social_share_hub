<?php

namespace ContainerXxnyntz;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getLinkedinCallbackControllerService extends App_KernelTestDebugContainer
{
    /**
     * Gets the public 'App\Controller\LinkedinCallbackController' shared autowired service.
     *
     * @return \App\Controller\LinkedinCallbackController
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4) . '' . \DIRECTORY_SEPARATOR . 'vendor' . \DIRECTORY_SEPARATOR . 'symfony' . \DIRECTORY_SEPARATOR . 'framework-bundle' . \DIRECTORY_SEPARATOR . 'Controller' . \DIRECTORY_SEPARATOR . 'AbstractController.php';
        include_once \dirname(__DIR__, 4) . '' . \DIRECTORY_SEPARATOR . 'src' . \DIRECTORY_SEPARATOR . 'Controller' . \DIRECTORY_SEPARATOR . 'LinkedinCallbackController.php';

        $container->services['App\\Controller\\LinkedinCallbackController'] = $instance = new \App\Controller\LinkedinCallbackController();

        $instance->setContainer(($container->privates['.service_locator.jIxfAsi'] ?? $container->load('get_ServiceLocator_JIxfAsiService'))->withContext('App\\Controller\\LinkedinCallbackController', $container));

        return $instance;
    }
}
