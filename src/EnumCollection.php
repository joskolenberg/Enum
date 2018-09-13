<?php

namespace JosKolenberg\Enum;

use Illuminate\Support\Collection;

class EnumCollection extends Collection
{
    public function identifiers()
    {
        return $this->map(function (Enum $enum) {
            return $enum->identifier();
        });
    }

    public function byIdentifier($identifier)
    {
        return $this->first(function (Enum $enum) use ($identifier) {
            return $enum->identifier() == $identifier;
        });
    }

    public function hasIdentifier($identifier)
    {
        return $this->contains(function (Enum $enum) use ($identifier) {
            return $enum->identifier() == $identifier;
        });
    }
}
