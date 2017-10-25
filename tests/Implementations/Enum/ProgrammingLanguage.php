<?php

class ProgrammingLanguage extends \JosKolenberg\Enum\Enum
{

    /**
     * @var
     */
    protected $key;

    public function __construct($key)
    {
        $this->key = $key;
    }

    /**
     * Seed the class with Enum instances
     *
     * @return array
     */
    protected static function seed()
    {
        return [
            new static('php'),
            new static('java'),
            new static('ruby'),
        ];
    }

    /**
     * Return the name of the attribute which stores the identifier
     *
     * @return mixed
     */
    protected function identifierAttribute()
    {
        return 'key';
    }
}