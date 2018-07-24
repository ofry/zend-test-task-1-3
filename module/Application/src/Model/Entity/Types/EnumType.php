<?php
    /**
     * Created by PhpStorm.
     * User: ofryak
     * Date: 17.07.18
     * Time: 14:46
     */

    namespace Application\Model\Entity\Types;


    use Doctrine\DBAL\Platforms\AbstractPlatform;
    use Doctrine\DBAL\Types\Type;

    /**
     * Class EnumType
     *
     * @package Application\Model\Entity\Types
     */
    abstract class EnumType extends Type
    {
        /**
         * @var
         */
        protected $name;
        /**
         * @var array
         */
        protected $values = array();

        /**
         * @param array                                     $fieldDeclaration
         * @param \Doctrine\DBAL\Platforms\AbstractPlatform $platform
         *
         * @return string
         */
        public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
        {
            $values = array_map(function ($val) {
                return "'" . $val . "'";
            }, $this->values);

            return "ENUM(" . implode(", ", $values) . ")";
        }

        /**
         * @param mixed                                     $value
         * @param \Doctrine\DBAL\Platforms\AbstractPlatform $platform
         *
         * @return mixed
         */
        public function convertToPHPValue($value, AbstractPlatform $platform)
        {
            return $value;
        }

        /**
         * @param mixed                                     $value
         * @param \Doctrine\DBAL\Platforms\AbstractPlatform $platform
         *
         * @return mixed
         */
        public function convertToDatabaseValue($value, AbstractPlatform $platform)
        {
            if (!in_array($value, $this->values)) {
                throw new \InvalidArgumentException("Invalid '" . $this->name . "' value.");
            }
            return $value;
        }

        /**
         * @return string
         */
        public function getName()
        {
            return $this->name;
        }

        /**
         * @param \Doctrine\DBAL\Platforms\AbstractPlatform $platform
         *
         * @return bool
         */
        public function requiresSQLCommentHint(AbstractPlatform $platform)
        {
            return true;
        }
    }