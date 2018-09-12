[![Total Downloads](https://poser.pugx.org/joskolenberg/enum/downloads)](https://packagist.org/packages/joskolenberg/enum)
[![Latest Stable Version](https://poser.pugx.org/joskolenberg/enum/v/stable)](https://packagist.org/packages/joskolenberg/enum)
[![License](https://poser.pugx.org/joskolenberg/enum/license)](https://packagist.org/packages/joskolenberg/enum)

# Enum
Enum implementation for PHP

## Intro
PHP doesn't come with Enums out of the box, this package isn't an exact enum implementation either but has it's own pros and cons.


## Installing

Use composer to pull this package in.

```js
    "require": {
        "joskolenberg/enum": "0.1.*"
    },
```

## Usage

### Setting up an enum

An enum can be created by extending the JosKolenberg\Enum\Enum class.

```php
use JosKolenberg\Enum\Enum;

class UserType extends Enum {}
```
This created class acts as the repository via static methods as well as the enum itself.

There are two abstract methods which have to be implemented.
Use the seed method to populate the class with Enums, and tell the class which attribute identifies the enums by returning the name of this attribute in the identifierAttribute method.

An example implementation would be:

```php
use JosKolenberg\Enum\Enum;

class UserType extends Enum
{

    protected $id;

    protected $name;

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * Seed the class with Enum instances
     *
     * @return array
     */
    protected static function seed()
    {
        return [
            new static('dev', 'Developer'),
            new static('admin', 'Administrator'),
            new static('user', 'User'),
        ];
    }

    /**
     * Return the name of the attribute which stores the identifier
     *
     * @return string
     */
    protected function identifierAttribute()
    {
        return 'id';
    }
}
```

Next, the class can be designed like way you would any other. Although enums aren't meant to have too much functionality on them.

### Repository
The class offers the following static "repository-like" methods:
- `get()` return the enum with the given identifier.
- `random()` return a random identifier (e.g. for seeding).
- `collection()` return an Illuminate\Support\Collection containing all enums. This collection class gives some easy flexibility in adjusting the list. (e.g. sorting it)
- `identifiers()` return an Illuminate\Support\Collection containing only the identifiers for the enums.
- `exists()` tell if an enum with the given identifier exists.

Enums are also available using a magic method with the same name as the identifier. e.g. `UserType::get('dev')` equals `UserType::dev()`

For clarity and code-completion though we encourage you to implement these methods like:
```php
public function dev(){
    return static::get('dev');
}
```

### Enum
The enum itself has the following methods:
- `identifier()` return the identifier value (e.g. 'dev' or 'admin' in the previous example) of this instance.
- `equals()` check if the given enum matches the current.

All defined attributes are by default available as read-only using magic getters:
- `$value = $userType->value` passes.
- `$userType->value = 'changed'` fails.

### Custom Classes
If different enums of the same type should have different behaviour you could of course extend the base enum to more specific ones.
```php
class UserType extends Enum
{

    protected $id;
    protected $name;

    protected static function seed()
    {
        return [
            new UserTypeDev(),
            new UserTypeAdmin(),
        ];
    }

    protected function identifierAttribute()
    {
        return 'id';
    }
}

class UserTypeDev extends UserType{
    
    public function __construct()
    {
        $this->id = 'dev';
        $this->name = 'Developer';
    }

    public function whatCanYouDo()
    {
        return 'I can code';
    }
}

class UserTypeAdmin extends UserType{
    
    public function __construct()
    {
        $this->id = 'admin';
        $this->name = 'Administrator';
    }

    public function whatCanYouDo()
    {
        return 'I can do some important stuff';
    }
}
```

If you wish to extend the functionality of the collection, you can assign your own custom collection to your enum using the static newCollection method.
```php
    protected static function newCollection(array $enums = [])
    {
        return new MyCustomEnumCollection($enums);
    }
```

### Pre-defined Enums

Because enums are usually no more than an identifier and maybe a display value, two pre-defined enums are available to extend.

Extend EnumWithId for an enum with only an id attribute:
```php
class UserStatus extends \JosKolenberg\Enum\EnumWithId
{
    protected static function seed()
    {
        return [
            new static('new'),
            new static('active'),
            new static('deleted'),
        ];
    }
}
```
Or extend EnumWithIdAndName for an enum with an id and name attribute:
```php
class ExtendedUserType extends \JosKolenberg\Enum\EnumWithIdAndName
{
    protected static function seed()
    {
        return [
            new static('dev', 'Developer'),
            new static('admin', 'Administrator'),
            new static('user', 'User'),
        ];
    }
}
```
Of course you can always create your own baseclass if you wish for different attributes on all of your enums.

Happy coding!

Jos Kolenberg <joskolenberg@gmail.com>
