<?php
    /**
     * Created by PhpStorm.
     * User: ofryak
     * Date: 11.07.18
     * Time: 3:01
     */

    namespace Application\Model\Entity;

    use Doctrine\ORM\Mapping\Builder\ClassMetadataBuilder;
    use Doctrine\ORM\Mapping\ClassMetadata;


    /**
     * Class TestItem
     *
     * Класс описывает запись в таблице базы данных.
     *
     * @package Application\Model\Entity
     */
    class TestItem
    {
        /**
         * Имя таблицы в БД
         */
        const TABLE = 'name';

        /**
         * @var integer
         */
        private $id;
        /**
         * @var string
         */
        private $script_name;
        /**
         * @var integer
         */
        private $start_time;
        /**
         * @var integer
         */
        private $end_time;
        /**
         * @var string
         */
        private $result;

        /**
         *
         * Описывает метаданные полей таблицы для Doctrine
         *
         * @param \Doctrine\ORM\Mapping\ClassMetadata $metadata
         *
         * @return void
         */
        public static function loadMetadata(ClassMetadata $metadata)
        {
            $builder = new ClassMetadataBuilder($metadata);
            $builder->setTable(self::TABLE);
            $builder->createField('id', 'integer')->makePrimaryKey()
                ->generatedValue()->build();
            $builder->createField('script_name', 'string')->length(25)
                ->nullable(false)->build();
            $builder->createField('start_time', 'integer')
                ->nullable(false)->build();
            $builder->createField('end_time', 'integer')
                ->nullable(false)->build();
            $builder->createField('result', Types\EnumResultType::NAME)
                ->nullable(false)->build();
        }

        /**
         * @return integer|null
         */
        public function getId()
        {
            return !empty($this->id) ? $this->id : null;
        }

        /**
         * @return string|null
         */
        public function getScriptName()
        {
            return !empty($this->script_name) ? $this->script_name : '';
        }

        /**
         * @param string $script_name
         */
        public function setScriptName($script_name)
        {
            $this->script_name = !empty($script_name) ? $script_name : '';
        }

        /**
         * @return integer
         */
        public function getStartTime()
        {
            return !empty($this->start_time) ? $this->start_time : 0;
        }

        /**
         * @param mixed $start_time
         */
        public function setStartTime($start_time)
        {
            $this->start_time = !empty($start_time) ? $start_time : 0;
        }

        /**
         * @return integer
         */
        public function getEndTime()
        {
            return !empty($this->end_time) ? $this->end_time : 0;
        }

        /**
         * @param mixed $end_time
         */
        public function setEndTime($end_time)
        {
            $this->end_time = !empty($end_time) ? $end_time : 0;
        }

        /**
         * @return string
         */
        public function getResult()
        {
            return $this->result;
        }

        /**
         * @param string $result
         */
        public function setResult($result)
        {
            $this->result = $result;
        }
    }