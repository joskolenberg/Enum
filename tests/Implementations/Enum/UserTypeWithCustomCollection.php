<?php

class UserTypeWithCustomCollection extends UserType
{
    protected static function newCollection(array $enums = [])
    {
        return new UserTypeCollection($enums);
    }
}
