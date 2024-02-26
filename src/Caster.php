<?php

namespace ACAT\Dto;

interface Caster
{
    public function cast(mixed $value): mixed;
}
