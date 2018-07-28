<?php
    /**
     * Created by PhpStorm.
     * User: ofryak
     * Date: 17.07.18
     * Time: 16:29
     */

    namespace Application\Model\Entity\Types;


    /**
     * Class EnumResultType
     *
     * @package Application\Model\Entity\Types
     */
    class EnumResultType extends EnumType
    {
        /**
         * Название типа для doctrine
         */
        const NAME = 'enumresult';
        /**
         * Возможные значения
         */
        const VALUES = array('normal', 'illegal', 'failed', 'success');
        /**
         * @var string
         */
        protected $name = self::NAME;
        /**
         * @var string[]
         */
        protected $values = self::VALUES;
    }