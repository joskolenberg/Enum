<?php

include_once "Implementations/EnumWithIdAndName/ExtendedUserType.php";

class EnumCollectionTest extends \PHPUnit\Framework\TestCase
{

    /**
     * @test
     */
    public function it_can_return_a_collection_of_only_the_identifiers()
    {
        $userTypes = ExtendedUserType::collection();

        $this->assertEquals(['dev', 'admin', 'user'], $userTypes->identifiers()->toArray());
    }

    /**
     * @test
     */
    public function it_can_return_an_enum_based_on_the_identifier()
    {
        $userTypes = ExtendedUserType::collection();
        $userTypeDev = $userTypes->byIdentifier('dev');
        $userTypeDev2 = ExtendedUserType::dev();

        $this->assertTrue($userTypeDev->equals($userTypeDev2));
    }

    /**
     * @test
     */
    public function it_return_null_if_an_enum_based_on_the_identifier_is_not_found()
    {
        $userTypes = ExtendedUserType::collection();
        $unknownUserType = $userTypes->byIdentifier('unknown');

        $this->assertNull($unknownUserType);
    }

    /**
     * @test
     */
    public function it_can_tell_if_an_enum_with_a_certain_identifier_exists_in_the_collection()
    {
        $userTypes = ExtendedUserType::collection();

        $this->assertTrue($userTypes->hasIdentifier('dev'));
        $this->assertFalse($userTypes->hasIdentifier('unknown'));
    }

}