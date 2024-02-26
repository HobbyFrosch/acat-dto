<?php

namespace ACAT\Dto\Tests\Dummy;

use ACAT\Dto\Attributes\DefaultCast;
use ACAT\Dto\Dto;

#[DefaultCast(ComplexObject::class, ComplexObjectCaster::class)]
class ComplexDtoWithCast extends Dto
{
    public string $name;

    public ComplexObject $object;
}
