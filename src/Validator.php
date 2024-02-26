<?php

namespace ACAT\Dto;

use ACAT\Dto\Validation\ValidationResult;

interface Validator
{
    public function validate(mixed $value): ValidationResult;
}
