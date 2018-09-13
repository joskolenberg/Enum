<?php

include_once 'Implementations/EnumWithIdAndName/ExtendedUserType.php';

class EnumWithIdAndNameTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function it_has_the_name_attibute()
    {
        $userType = ExtendedUserType::get('dev');

        $this->assertEquals('Developer', $userType->name);
        $this->assertEquals('Developer', $userType->getName());
    }
}
