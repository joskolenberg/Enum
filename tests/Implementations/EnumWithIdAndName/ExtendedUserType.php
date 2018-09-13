<?php

class ExtendedUserType extends \JosKolenberg\Enum\EnumWithIdAndName
{
    /**
     * Seed the class with Enum instances.
     *
     * @return array
     */
    protected static function seed()
    {
        return [
            new static('dev', 'Developer'),
            new static('admin', 'Administrator'),
            new static('user', 'User'),
        ];
    }
}
