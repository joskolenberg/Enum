<?php

/**
 * Created by PhpStorm.
 * User: joskolenberg
 * Date: 25-10-17
 * Time: 14:44
 */
class UserType extends \JosKolenberg\Enum\Enum
{

    /**
     * @var
     */
    protected $value;

    protected $identifierAttribute = 'value';

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
}