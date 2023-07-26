<?php

namespace ContainerCqYfIDS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getNelmioApiDoc_ObjectModel_PropertyDescribers_FloatService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private 'nelmio_api_doc.object_model.property_describers.float' shared service.
     *
     * @return \Nelmio\ApiDocBundle\PropertyDescriber\FloatPropertyDescriber
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'nelmio'.\DIRECTORY_SEPARATOR.'api-doc-bundle'.\DIRECTORY_SEPARATOR.'PropertyDescriber'.\DIRECTORY_SEPARATOR.'PropertyDescriberInterface.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'nelmio'.\DIRECTORY_SEPARATOR.'api-doc-bundle'.\DIRECTORY_SEPARATOR.'PropertyDescriber'.\DIRECTORY_SEPARATOR.'NullablePropertyTrait.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'nelmio'.\DIRECTORY_SEPARATOR.'api-doc-bundle'.\DIRECTORY_SEPARATOR.'PropertyDescriber'.\DIRECTORY_SEPARATOR.'FloatPropertyDescriber.php';

        return $container->privates['nelmio_api_doc.object_model.property_describers.float'] = new \Nelmio\ApiDocBundle\PropertyDescriber\FloatPropertyDescriber();
    }
}