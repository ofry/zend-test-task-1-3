<?php
    /**
     * Created by PhpStorm.
     * User: ofryak
     * Date: 13.07.18
     * Time: 20:59
     */

    namespace Application\Factory;

    use Application\Model\TestTable;
    use Interop\Container\ContainerInterface;
    use Zend\ServiceManager\Factory\FactoryInterface;


    class DbFactory implements FactoryInterface
    {
        public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
        {
            return new TestTable($container->get('doctrine.entitymanager.orm_default'),
                $container->get('MyLogger'));
        }
    }