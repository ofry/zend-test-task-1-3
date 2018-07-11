<?php
    /**
     * Created by PhpStorm.
     * User: ofryak
     * Date: 11.07.18
     * Time: 3:01
     */

    namespace Application\Model;


    class TestItem
    {
        public $id;
        public $script_name;
        public $start_time;
        public $end_time;
        public $result;

        public function exchangeArray(array $data)
        {
            $this->id = !empty($data['id']) ? $data['id'] : null;
            $this->script_name = !empty($data['script_name']) ? $data['script_name'] : null;
            $this->start_time = !empty($data['start_time']) ? $data['start_time'] : null;
            $this->end_time = !empty($data['end_time']) ? $data['end_time'] : null;
            $this->result = !empty($data['result']) ? $data['result'] : null;
        }
    }