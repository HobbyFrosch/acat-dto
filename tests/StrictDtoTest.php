<?php

namespace ACAT\Dto\Tests;

use ACAT\Dto\Attributes\Strict;
use ACAT\Dto\Dto;
use ACAT\Dto\Exceptions\UnknownProperties;

class StrictDtoTest extends TestCase
{
    /** @test */
    public function non_strict_test()
    {
        $dto = new NonStrictDto(
            name: 'name',
            unknown: 'unknown'
        );

        $this->markTestSucceeded();
    }

    /** @test */
    public function strict_test()
    {
        $this->expectException(UnknownProperties::class);

        $dto = new StrictDto(
            name:    'name',
            unknown: 'unknown'
        );
    }

    /** @test */
    public function strict_child_test()
    {
        $this->expectException(UnknownProperties::class);

        $dto = new ChildStrictDto(
            name: 'name',
            unknown: 'unknown'
        );
    }
}

#[Strict]
class StrictDto extends Dto
{
    public string $name;
}

final class ChildStrictDto extends StrictDto
{
}


class NonStrictDto extends Dto
{
    public string $name;
}
