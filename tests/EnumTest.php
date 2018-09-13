<?php

include_once 'Implementations/Enum/ProgrammingLanguage.php';
include_once 'Implementations/Enum/UserType.php';
include_once 'Implementations/Enum/UserTypeWithCustomCollection.php';
include_once 'Implementations/Enum/UserTypeCollection.php';

class EnumTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function it_can_return_an_enum_using_the_get_method()
    {
        $userTypeDev = UserType::get('user');

        $this->assertEquals('user', $userTypeDev->identifier());
    }

    /**
     * @test
     */
    public function it_can_return_an_enum_using_the_magic_getter_method()
    {
        $userTypeDev = UserType::dev();

        $this->assertEquals('dev', $userTypeDev->identifier());
    }

    /**
     * @test
     */
    public function it_throws_an_exception_when_an_enum_is_not_found_with_the_given_identifier()
    {
        $this->expectException(\JosKolenberg\Enum\EnumNotFoundException::class);

        UserType::not_available();
    }

    /**
     * @test
     */
    public function it_returns_the_identifier_based_on_the_identifierAttribute_attribute()
    {
        $userTypeDev = UserType::dev();

        $this->assertEquals($userTypeDev->identifier(), $userTypeDev->value);

        $programmingLanguagePhp = ProgrammingLanguage::php();
        $this->assertEquals($programmingLanguagePhp->identifier(), $programmingLanguagePhp->key);
    }

    /**
     * @test
     */
    public function it_can_handle_multiple_implementations()
    {
        $userTypeDev = UserType::get('dev');
        $programmingLanguageJava = ProgrammingLanguage::get('java');
        $userTypeAdmin = UserType::get('admin');
        $programmingLanguagePhp = ProgrammingLanguage::get('php');

        $this->assertEquals('dev', $userTypeDev->identifier());
        $this->assertEquals('php', $programmingLanguagePhp->identifier());
        $this->assertEquals('admin', $userTypeAdmin->identifier());
        $this->assertEquals('java', $programmingLanguageJava->identifier());
    }

    /**
     * @test
     */
    public function it_can_use_a_custom_collection()
    {
        $userTypeCollection = UserTypeWithCustomCollection::collection();

        $this->assertInstanceOf(UserTypeCollection::class, $userTypeCollection);
    }

    /**
     * @test
     */
    public function it_can_give_a_random_enum()
    {
        $dev = $admin = $user = 0;

        for ($i = 0; $i < 100; $i++) {
            $userType = UserType::random();
            ${$userType->identifier()}++;
        }

        $this->assertGreaterThan(0, $dev);
        $this->assertGreaterThan(0, $admin);
        $this->assertGreaterThan(0, $user);
        $this->assertEquals(100, $user + $admin + $dev);
    }

    /**
     * @test
     */
    public function it_can_return_a_collection_of_enums()
    {
        $userTypes = UserType::collection();

        $this->assertInstanceOf(\JosKolenberg\Enum\EnumCollection::class, $userTypes);
        $this->assertEquals(3, $userTypes->count());
    }

    /**
     * @test
     */
    public function its_attributes_are_gettable_but_not_settable()
    {
        $userType = UserType::dev();

        $this->assertEquals('dev', $userType->value);

        $this->expectException(\Error::class);

        $userType->value = 'not allowed';
    }

    /**
     * @test
     */
    public function it_returns_the_identifier_when_casted_to_a_string()
    {
        $userType = UserType::dev();

        $this->assertEquals('dev', (string) $userType);
    }

    /**
     * @test
     */
    public function it_can_check_weather_two_enums_are_equal()
    {
        $userType = UserType::dev();
        $userType2 = UserType::dev();

        $this->assertTrue($userType->equals($userType2));
    }

    /**
     * @test
     */
    public function it_only_seeds_the_enums_once_so_there_can_be_only_one_instance_of_each_enum()
    {
        $userTypeDev = UserType::get('dev');
        $programmingLanguageJava = ProgrammingLanguage::get('java');
        $userTypeAdmin = UserType::get('admin');
        $programmingLanguagePhp = ProgrammingLanguage::get('php');
        $userTypeDev2 = UserType::get('dev');

        $this->assertTrue($userTypeDev->equals($userTypeDev2));
    }

    /**
     * @test
     */
    public function enums_are_not_meant_to_be_created_manually_and_will_not_be_considered_equal()
    {
        $userTypeDev = UserType::get('dev');
        $userTypeDev2 = new UserType('dev');

        $this->assertFalse($userTypeDev->equals($userTypeDev2));
    }

    /**
     * @test
     */
    public function it_can_return_a_collection_of_only_the_identifiers_of_the_enums()
    {
        $userTypes = UserType::identifiers();

        $this->assertEquals(['dev', 'admin', 'user'], $userTypes->toArray());
    }

    /**
     * @test
     */
    public function it_can_tell_if_an_enum_exists()
    {
        $this->assertTrue(UserType::exists('dev'));
        $this->assertFalse(UserType::exists('not_here'));
    }
}
