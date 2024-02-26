<?php

namespace ACAT\Dto\Tests\Dummy;

use ACAT\Dto\Dto;

class ComplexDtoWithNullableProperty extends Dto
{
    public string $name;

    public ?BasicDto $other;
}
