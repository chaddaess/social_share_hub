<?php

namespace ContainerCqYfIDS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getNelmioApiDoc_ModelDescribers_EnumService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private 'nelmio_api_doc.model_describers.enum' shared service.
     *
     * @return \Nelmio\ApiDocBundle\ModelDescriber\EnumModelDescriber
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'nelmio'.\DIRECTORY_SEPARATOR.'api-doc-bundle'.\DIRECTORY_SEPARATOR.'ModelDescriber'.\DIRECTORY_SEPARATOR.'ModelDescriberInterface.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'nelmio'.\DIRECTORY_SEPARATOR.'api-doc-bundle'.\DIRECTORY_SEPARATOR.'ModelDescriber'.\DIRECTORY_SEPARATOR.'EnumModelDescriber.php';

        return $container->privates['nelmio_api_doc.model_describers.enum'] = new \Nelmio\ApiDocBundle\ModelDescriber\EnumModelDescriber();
    }
}