<?php

namespace ACAT\Dto\Tests\Dummy;

use ACAT\Dto\Caster;

class ComplexObjectWithCasterCaster implements Caster
{
    /**
     * @param array|mixed $value
     *
     * @return mixed
     */
    public function cast(mixed $value): ComplexObjectWithCaster
    {
        return new ComplexObjectWithCaster(
            name: $value['name']
        );
    }
}
