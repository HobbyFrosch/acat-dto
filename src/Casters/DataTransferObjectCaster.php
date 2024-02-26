<?php

namespace ACAT\Dto\Casters;

use ACAT\Dto\Caster;
use ACAT\Dto\Dto;

class DataTransferObjectCaster implements Caster
{
    public function __construct(
        private array $classNames
    ) {
    }

    public function cast(mixed $value): Dto
    {
        foreach ($this->classNames as $className) {
            if ($value instanceof $className) {
                return $value;
            }
        }

        return new $this->classNames[0]($value);
    }
}
