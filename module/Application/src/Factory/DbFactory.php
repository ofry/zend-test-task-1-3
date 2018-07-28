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


    /**
     * Class DbFactory
     *
     * Фабрика для класса \Application\Model\TestTable
     *
     * @package Application\Factory
     */
    class DbFactory implements FactoryInterface
    {
        /**
         * @param \Interop\Container\ContainerInterface $container
         * @param string                                $requestedName
         * @param array|null                            $options
         *
         * @return \Application\Model\TestTable
         */
        public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
        {
            return new TestTable($container->get('doctrine.entitymanager.orm_default'),
                $container->get('MyLogger'));
        }
    }