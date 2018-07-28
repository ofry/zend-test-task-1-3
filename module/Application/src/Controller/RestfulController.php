<?php
    /**
     * Created by PhpStorm.
     * User: ofryak
     * Date: 11.07.18
     * Time: 2:37
     */

    namespace Application\Controller;

    use Application\Model\TestTable;
    use Zend\Hydrator\ClassMethods;
    use Zend\Mvc\Controller\AbstractRestfulController;
    use Zend\View\Model\JsonModel;

    /**
     * Class RestfulController
     *
     * @package Application\Controller
     */
    class RestfulController extends AbstractRestfulController
    {
        /**
         * @var \Application\Model\TestTable
         */
        private $table;
        /**
         * @var \Zend\Hydrator\ClassMethods
         */
        private $hydrator;

        /**
         * RestfulController constructor.
         *
         * @param \Application\Model\TestTable $table
         */
        public function __construct(TestTable $table)
        {
            $this->table = $table;
            $this->hydrator = new ClassMethods();
        }

        /**
         * @return \Zend\View\Model\JsonModel
         */
        public function indexAction()
        {
            /** @var array $entries */
            $entries = $this->table->get();
            $result = array();
            foreach ($entries as $entry) {
                $result[] = $this->hydrator->extract($entry);
            }
            return new JsonModel(array('response' => $result));
        }
    }