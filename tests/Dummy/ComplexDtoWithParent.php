<?php

namespace ACAT\Dto\Tests\Dummy;

class ComplexDtoWithParent extends ComplexDtoWithSelf
{
    public string $name;

    public ?parent $other;
}
