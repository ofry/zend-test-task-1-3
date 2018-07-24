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

    class RestfulController extends AbstractRestfulController
    {
        private $table;
        private $hydrator;

        public function __construct(TestTable $table)
        {
            $this->table = $table;
            $this->hydrator = new ClassMethods();
        }

        public function indexAction()
        {
            $entries = $this->table->get();
            $result = array();
            foreach ($entries as $entry) {
                $result[] = $this->hydrator->extract($entry);
            }
            return new JsonModel(array('response' => $result));
        }
    }