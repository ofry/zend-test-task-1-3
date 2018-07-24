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
     * @package Application\Model\Entity
     */
    class TestItem
    {
        /**
         *
         */
        const TABLE = 'name';

        /**
         * @var
         */
        private $id;
        /**
         * @var
         */
        private $script_name;
        /**
         * @var
         */
        private $start_time;
        /**
         * @var
         */
        private $end_time;
        /**
         * @var
         */
        private $result;

        /**
         * @param \Doctrine\ORM\Mapping\ClassMetadata $metadata
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
         * @return mixed
         */
        public function getId()
        {
            return !empty($this->id) ? $this->id : null;
        }

        /**
         * @return mixed
         */
        public function getScriptName()
        {
            return !empty($this->script_name) ? $this->script_name : '';
        }

        /**
         * @param mixed $script_name
         */
        public function setScriptName($script_name)
        {
            $this->script_name = !empty($script_name) ? $script_name : '';
        }

        /**
         * @return mixed
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
         * @return mixed
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
         * @return mixed
         */
        public function getResult()
        {
            return $this->result;
        }

        /**
         * @param mixed $result
         */
        public function setResult($result)
        {
            $this->result = $result;
        }
    }