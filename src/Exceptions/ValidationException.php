<?php

namespace ACAT\Dto\Exceptions;

use Exception;
use ACAT\Dto\Dto;

class ValidationException extends Exception
{
    public function __construct(
        public Dto $dataTransferObject,
        public array $validationErrors,
    ) {
        $className = $dataTransferObject::class;

        $messages = [];

        foreach ($validationErrors as $fieldName => $errorsForField) {
            /** @var \ACAT\Dto\Validation\ValidationResult $errorForField */
            foreach ($errorsForField as $errorForField) {
                $messages[] = "\t - `{$className}->{$fieldName}`: {$errorForField->message}";
            }
        }

        parent::__construct("Validation errors:" . PHP_EOL . implode(PHP_EOL, $messages));
    }
}
