<?php

namespace ACAT\Dto\Tests\Dummy;

use ACAT\Dto\Attributes\Strict;
use ACAT\Dto\Dto;

#[Strict]
class ComplexStrictDto extends Dto
{
    public string $name;

    public BasicDto $other;
}
