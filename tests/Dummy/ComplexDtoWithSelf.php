<?php

namespace ACAT\Dto\Tests\Dummy;

use ACAT\Dto\Dto;

class ComplexDtoWithSelf extends Dto
{
    public string $name;

    public ?self $other;
}
