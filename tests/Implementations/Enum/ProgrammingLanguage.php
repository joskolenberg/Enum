<?php

/**
 * Created by PhpStorm.
 * User: joskolenberg
 * Date: 25-10-17
 * Time: 14:33
 */
class ProgrammingLanguage extends \JosKolenberg\Enum\Enum
{

    /**
     * @var
     */
    protected $key;

    protected $identifierAttribute = 'key';

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
}