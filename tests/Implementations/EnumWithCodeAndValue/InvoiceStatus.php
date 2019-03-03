<?php

class InvoiceStatus extends \JosKolenberg\Enum\EnumWithCodeAndValue
{
    /**
     * Seed the class with Enum instances.
     *
     * @return array
     */
    protected static function seed()
    {
        return [
            new static('concept', 'In concept'),
            new static('final', 'Unpaid'),
            new static('paid', 'Has been paid'),
        ];
    }
}
