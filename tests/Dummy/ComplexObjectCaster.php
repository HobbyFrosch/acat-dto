<?php

namespace ACAT\Dto\Tests\Dummy;

use ACAT\Dto\Caster;

class ComplexObjectCaster implements Caster
{
    /**
     * @param array|mixed $value
     *
     * @return mixed
     */
    public function cast(mixed $value): ComplexObject
    {
        return new ComplexObject(
            name: $value['name']
        );
    }
}
