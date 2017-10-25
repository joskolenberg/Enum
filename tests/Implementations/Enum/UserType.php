<?php

class UserType extends \JosKolenberg\Enum\Enum
{

    /**
     * @var
     */
    protected $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * Seed the class with Enum instances
     *
     * @return array
     */
    protected static function seed()
    {
        return [
            new static('dev'),
            new static('admin'),
            new static('user'),
        ];
    }

    /**
     * Return the name of the attribute which stores the identifier
     *
     * @return mixed
     */
    protected static function identifierAttribute()
    {
        return 'value';
    }
}