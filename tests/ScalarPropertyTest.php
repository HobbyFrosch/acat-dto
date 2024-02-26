<?php

namespace ACAT\Dto\Tests;

use ACAT\Dto\Dto;

class ScalarPropertyTest extends TestCase
{
    /** @test */
    public function scalar_property_can_be_set()
    {
        $dto = new ScalarPropertyDto(foo: 1);

        $this->assertEquals(1, $dto->foo);
    }
}

class ScalarPropertyDto extends Dto
{
    public int $foo;
}
