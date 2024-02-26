<?php

namespace ACAT\Dto\Tests;

use ACAT\Dto\Dto;
use ACAT\Dto\Tests\Dummy\ComplexObjectWithCaster;

class CasterOnObjectTest extends TestCase
{
    /** @test */
    public function property_is_casted()
    {
        $dto = new class (complexObject: [ 'name' => 'test' ]) extends Dto {
            public ComplexObjectWithCaster $complexObject;
        };

        $this->assertEquals('test', $dto->complexObject->name);
    }
}
