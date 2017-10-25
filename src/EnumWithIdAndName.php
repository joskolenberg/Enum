<?php

namespace JosKolenberg\Enum;


abstract class EnumWithIdAndName extends EnumWithId
{

    /**
     * The displayname for the instance
     *
     * @var mixed
     */
    protected $name;

    /**
     * AbstractEnumWithIdAndName constructor.
     *
     * @param $id
     * @param $name
     */
    public function __construct($id, $name)
    {
        parent::__construct($id);
        $this->name = $name;
    }

    /**
     * Get the name attribute
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

}