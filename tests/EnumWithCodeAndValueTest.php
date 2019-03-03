<?php

include_once 'Implementations/EnumWithIdAndName/ExtendedUserType.php';

class EnumWithCodeAndValueTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function it_has_the_value_attibute()
    {
        $invoiceStatus = InvoiceStatus::get('paid');

        $this->assertEquals('Has been paid', $invoiceStatus->value);
        $this->assertEquals('Has been paid', $invoiceStatus->getValue());
    }

    /**
     * @test
     */
    public function it_has_the_code_attribute_set_as_identifier()
    {
        $invoiceStatus = InvoiceStatus::get('concept');

        $this->assertEquals('concept', $invoiceStatus->code);
        $this->assertEquals($invoiceStatus->identifier(), $invoiceStatus->code);

        $this->assertEquals('In concept', $invoiceStatus->value);
        $this->assertEquals('In concept', $invoiceStatus->getValue());
    }

    /**
     * @test
     */
    public function it_can_give_the_code_attribute_by_the_geCode_method()
    {
        $invoiceStatus = InvoiceStatus::get('final');

        $this->assertEquals($invoiceStatus->getCode(), $invoiceStatus->code);
    }
}
