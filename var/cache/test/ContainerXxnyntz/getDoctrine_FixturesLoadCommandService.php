<?php

namespace ContainerXxnyntz;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getDoctrine_FixturesLoadCommandService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private 'doctrine.fixtures_load_command' shared service.
     *
     * @return \Doctrine\Bundle\FixturesBundle\Command\LoadDataFixturesDoctrineCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4) . '' . \DIRECTORY_SEPARATOR . 'vendor' . \DIRECTORY_SEPARATOR . 'symfony' . \DIRECTORY_SEPARATOR . 'console' . \DIRECTORY_SEPARATOR . 'Command' . \DIRECTORY_SEPARATOR . 'Command.php';
        include_once \dirname(__DIR__, 4) . '' . \DIRECTORY_SEPARATOR . 'vendor' . \DIRECTORY_SEPARATOR . 'doctrine' . \DIRECTORY_SEPARATOR . 'doctrine-bundle' . \DIRECTORY_SEPARATOR . 'Command' . \DIRECTORY_SEPARATOR . 'DoctrineCommand.php';
        include_once \dirname(__DIR__, 4) . '' . \DIRECTORY_SEPARATOR . 'vendor' . \DIRECTORY_SEPARATOR . 'doctrine' . \DIRECTORY_SEPARATOR . 'doctrine-fixtures-bundle' . \DIRECTORY_SEPARATOR . 'Command' . \DIRECTORY_SEPARATOR . 'LoadDataFixturesDoctrineCommand.php';
        include_once \dirname(__DIR__, 4) . '' . \DIRECTORY_SEPARATOR . 'vendor' . \DIRECTORY_SEPARATOR . 'doctrine' . \DIRECTORY_SEPARATOR . 'doctrine-fixtures-bundle' . \DIRECTORY_SEPARATOR . 'Purger' . \DIRECTORY_SEPARATOR . 'PurgerFactory.php';
        include_once \dirname(__DIR__, 4) . '' . \DIRECTORY_SEPARATOR . 'vendor' . \DIRECTORY_SEPARATOR . 'doctrine' . \DIRECTORY_SEPARATOR . 'doctrine-fixtures-bundle' . \DIRECTORY_SEPARATOR . 'Purger' . \DIRECTORY_SEPARATOR . 'ORMPurgerFactory.php';

        $container->privates['doctrine.fixtures_load_command'] = $instance = new \Doctrine\Bundle\FixturesBundle\Command\LoadDataFixturesDoctrineCommand(($container->privates['doctrine.fixtures.loader'] ?? $container->load('getDoctrine_Fixtures_LoaderService')), ($container->services['doctrine'] ?? $container->getDoctrineService()), ['default' => ($container->privates['doctrine.fixtures.purger.orm_purger_factory'] ?? ($container->privates['doctrine.fixtures.purger.orm_purger_factory'] = new \Doctrine\Bundle\FixturesBundle\Purger\ORMPurgerFactory()))]);

        $instance->setName('doctrine:fixtures:load');

        return $instance;
    }
}
