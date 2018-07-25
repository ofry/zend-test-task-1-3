<?php
    /**
     * Created by PhpStorm.
     * User: ofryak
     * Date: 26.07.18
     * Time: 0:19
     */

    namespace Application\Factory;

    use Interop\Container\ContainerInterface;
    use Zend\ServiceManager\Factory\FactoryInterface;

    class RestfulControllerFactory implements FactoryInterface
    {
        public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
        {
            return new $requestedName($container->get(DbFactory::class));
        }
    }