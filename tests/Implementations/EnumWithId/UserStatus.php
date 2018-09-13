<?php

class UserStatus extends \JosKolenberg\Enum\EnumWithId
{
    /**
     * Seed the class with Enum instances.
     *
     * @return array
     */
    protected static function seed()
    {
        return [
            new static('new'),
            new static('active'),
            new static('deleted'),
        ];
    }
}
