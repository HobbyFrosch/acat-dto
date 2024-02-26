<?php

namespace ACAT\Dto\Tests;

use ACAT\Dto\Dto;
use ACAT\Dto\Exceptions\ValidationException;
use ACAT\Dto\Tests\Dummy\NumberBetween;

class ValidationTest extends TestCase
{
    /** @test */
    public function test_validation()
    {
        $dto = new class (foo: 50) extends Dto {
            #[NumberBetween(1, 100)]
            public int $foo;
        };

        $this->assertEquals(50, $dto->foo);

        $this->expectException(ValidationException::class);

        new class (foo: 150) extends Dto {
            #[NumberBetween(1, 100)]
            public int $foo;
        };
    }
}
