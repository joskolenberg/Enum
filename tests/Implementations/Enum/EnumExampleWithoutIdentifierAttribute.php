<?php

/**
 * Created by PhpStorm.
 * User: joskolenberg
 * Date: 25-10-17
 * Time: 14:39
 */
class EnumExampleWithoutIdentifierAttribute extends JosKolenberg\Enum\Enum
{

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