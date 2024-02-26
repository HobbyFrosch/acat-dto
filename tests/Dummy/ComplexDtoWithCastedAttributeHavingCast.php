<?php

namespace ACAT\Dto\Tests\Dummy;

use ACAT\Dto\Dto;

class ComplexDtoWithCastedAttributeHavingCast extends Dto
{
    public string $name;

    public ComplexDtoWithCast $other;
}
