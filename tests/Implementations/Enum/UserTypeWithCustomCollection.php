<?php

/**
 * Created by PhpStorm.
 * User: joskolenberg
 * Date: 25-10-17
 * Time: 14:59
 */
class UserTypeWithCustomCollection extends UserType
{
    protected static function newCollection(array $enums = [])
    {
        return new UserTypeCollection($enums);
    }
}