<?php

namespace JosKolenberg\Enum;

abstract class EnumWithCodeAndValue extends Enum
{
    /**
     * The code for the instance.
     *
     * @var mixed
     */
    protected $code;

    /**
     * The value for the instance.
     *
     * @var mixed
     */
    protected $value;

    /**
     * AbstractEnumWithIdAndName constructor.
     *
     * @param $code
     * @param $value
     */
    public function __construct($code, $value)
    {
        $this->code = $code;
        $this->value = $value;
    }

    /**
     * Get the code attribute.
     *
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Get the value attribute.
     *
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Return the name of the attribute which stores the identifier.
     *
     * @return mixed
     */
    protected function identifierAttribute()
    {
        return 'code';
    }
}
