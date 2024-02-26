<?php

namespace ACAT\Dto\Tests\Dummy;

use ACAT\Dto\Dto;

class ComplexDto extends Dto
{
    public string $name;

    public BasicDto $other;
}
