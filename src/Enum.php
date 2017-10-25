<?php

namespace JosKolenberg\Enum;


use Illuminate\Support\Collection;

abstract class Enum
{

    /**
     * The array with collections of resolved Enums
     *
     * @var array
     */
    protected static $resolvedInstances = [];

    /**
     * Seed the class with Enum instances
     *
     * @return array
     */
    protected abstract static function seed();

    /**
     * Return the name of the attribute which stores the identifier
     *
     * @return string
     */
    protected abstract function identifierAttribute();

    /**
     * Check if the instances are resolved for the
     * current class and if not, resolve them
     *
     * @param $class
     * @return void
     */
    protected static function bootIfNotBooted($class)
    {
        if (isset(static::$resolvedInstances[$class])) return;

        static::$resolvedInstances[$class] = $class::newCollection($class::seed());
    }

    /**
     * Return a new Collection instance
     *
     * @param array $enums
     * @return EnumCollection
     */
    protected static function newCollection(array $enums = [])
    {
        return new EnumCollection($enums);
    }

    /**
     * Get an enum by identifier
     *
     * @param $identifier
     * @return Enum
     * @throws EnumNotFoundException
     */
    public static function get($identifier)
    {
        if (!static::exists($identifier)) throw new EnumNotFoundException();

        return static::collection()->byIdentifier($identifier);
    }

    /**
     * Return a random Enum
     *
     * @return Enum
     */
    public static function random()
    {
        return static::collection()->random();
    }

    /**
     * Return a collection with all Enums
     *
     * @return Collection
     */
    public static function collection()
    {
        $class = get_called_class();
        static::bootIfNotBooted($class);

        return static::$resolvedInstances[$class];
    }

    /**
     * Make it possible to retrieve an Enum by using it's identifier
     * as a function name
     *
     * e.g. UserType::get('dev') equals UserType::dev()
     *
     * @param $name
     * @param $arguments
     * @return Enum
     */
    public static function __callStatic($name, $arguments)
    {
        return static::get($name);
    }

    /**
     * Make the attributes readable from the outside
     *
     * @param $field
     * @return mixed
     */
    public function __get($field)
    {
        return $this->$field;
    }

    /**
     * Present the instance as the identifier when casted to a string
     *
     * @return mixed
     */
    public function __toString()
    {
        return $this->identifier();
    }

    /**
     * Get the identifier for the instance
     *
     * @return mixed
     * @throws EnumException
     */
    public function identifier()
    {
        return $this->{$this->identifierAttribute()};
    }

    /**
     * Test if the given Enum equals the current
     *
     * @param Enum $enum
     * @return bool
     */
    public function equals(Enum $enum)
    {
        return ($this === $enum);
    }

    /**
     * Get a collection with only the identifiers
     *
     * @return mixed
     */
    public static function identifiers()
    {
        return static::collection()->identifiers();
    }

    /**
     * Check if an Enum with the given identifier exists
     *
     * @param $identifier
     * @return mixed
     */
    public static function exists($identifier)
    {
        return static::collection()->hasIdentifier($identifier);
    }
}