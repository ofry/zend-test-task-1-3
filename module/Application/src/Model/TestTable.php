<?php
    /**
     * Created by PhpStorm.
     * User: ofryak
     * Date: 13.07.18
     * Time: 21:39
     */

    namespace Application\Model;

    use Doctrine\ORM\EntityManager;
    use Doctrine\ORM\Tools\SchemaTool;
    use RuntimeException;
    use Zend\Log\Logger;

    /**
     * Class TestTable
     *
     * @package Application\Model
     */
    class TestTable
    {
        /**
         * @var \Doctrine\ORM\EntityManager
         */
        private $db;
        /**
         * @var \Zend\Log\Logger
         */
        private $logger;

        /**
         * TestTable constructor.
         *
         * @param \Doctrine\ORM\EntityManager $db
         * @param \Zend\Log\Logger            $logger
         */
        public function __construct(EntityManager $db, Logger $logger)
        {
            $this->db = $db;
            $this->logger = $logger;
            Logger::registerErrorHandler($this->logger);
            Logger::registerExceptionHandler($this->logger);
            $this->create();
            $this->fill();
        }

        /**
         *
         */
        private function create()
        {
            $tool = new SchemaTool($this->db);
            $classes = array(
                $this->db->getClassMetadata(Entity\TestItem::class),
            );
            $tool->dropSchema($classes);
            try {
                $tool->createSchema($classes);
            }
            catch (\Throwable $e) {
                $this->logger->emerg($e);
                throw new RuntimeException('Невозможно создать таблицу в БД.');
            }
        }

        /**
         *
         */
        private function fill()
        {
            try {
                $quantity = random_int(1, 2000);
                for ($count = 0; $count < $quantity; $count++) {
                    $entry = new Entity\TestItem();
                    $entry->setScriptName(bin2hex(random_bytes(10)));
                    $entry->setStartTime(random_int(0, 2147483647));
                    $entry->setEndTime(random_int(0, 2147483647));
                    $entry->setResult(Entity\Types\EnumResultType::VALUES[random_int(
                        0, count(Entity\Types\EnumResultType::VALUES)
                    ) - 1]);
                    $this->db->persist($entry);
                    $this->db->flush();
                }
            }
            catch (\Throwable $e) {
                $this->logger->emerg($e);
                throw new RuntimeException('Наверное, на данном компьютере нет генератора
                 случайных чисел');
            }
        }

        /**
         *
         */
        public function get()
        {
            $values = array('normal', 'success');
            $entries = $this->db->getRepository(Entity\TestItem::class)
                ->findBy(array('result' => $values));
            return $entries;
        }
    }