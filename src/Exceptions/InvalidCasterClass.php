<?php

namespace ACAT\Dto\Exceptions;

use Exception;
use ACAT\Dto\Caster;

class InvalidCasterClass extends Exception
{
    public function __construct(string $className, $code = 400)
    {
        $expected = Caster::class;

        parent::__construct(
            "Class `$className` doesn't implement $expected and can't be used as a caster",
            $code
        );
    }
}
