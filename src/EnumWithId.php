<?php

namespace JosKolenberg\Enum;


abstract class EnumWithId extends Enum
{

    /**
     * The identifier for the instance
     *
     * @var mixed
     */
    protected $id;

    /**
     * AbstractEnumWithId constructor.
     *
     * @param $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Get the id attribute
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Return the name of the attribute which stores the identifier
     *
     * @return mixed
     */
    protected static function identifierAttribute()
    {
        return 'id';
    }
}