<?php

include_once 'Implementations/EnumWithId/UserStatus.php';

class EnumWithIdTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function it_has_the_id_attribute_set_as_identifier()
    {
        $userStatus = UserStatus::get('new');

        $this->assertEquals('new', $userStatus->id);
        $this->assertEquals($userStatus->identifier(), $userStatus->id);
    }

    /**
     * @test
     */
    public function it_can_give_the_id_attribute_by_the_getId_method()
    {
        $userStatus = UserStatus::get('active');

        $this->assertEquals($userStatus->getId(), $userStatus->id);
    }
}
