<?php

namespace ACAT\Dto\Tests;

use ACAT\Dto\Attributes\CastWith;
use ACAT\Dto\Dto;
use ACAT\Dto\Tests\Dummy\ComplexObject;
use ACAT\Dto\Tests\Dummy\ComplexObjectCaster;

class CasterOnPropertyTest extends TestCase
{
    /** @test */
    public function property_is_casted()
    {
        $dto = new class (complexObject: [ 'name' => 'test' ]) extends Dto {
            #[CastWith(ComplexObjectCaster::class)]
            public ComplexObject $complexObject;
        };

        $this->assertEquals('test', $dto->complexObject->name);
    }
}
