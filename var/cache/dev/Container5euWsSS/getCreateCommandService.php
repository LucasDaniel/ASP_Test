<?php

namespace Container5euWsSS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getCreateCommandService extends ASPTest_KernelDevDebugContainer
{
    /**
     * Gets the public 'console.command.public_alias.ASPTest\Command\CreateCommand' shared autowired service.
     *
     * @return \ASPTest\Command\CreateCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'console'.\DIRECTORY_SEPARATOR.'Command'.\DIRECTORY_SEPARATOR.'Command.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Command'.\DIRECTORY_SEPARATOR.'CreateCommand.php';

        return $container->services['console.command.public_alias.ASPTest\\Command\\CreateCommand'] = new \ASPTest\Command\CreateCommand();
    }
}
