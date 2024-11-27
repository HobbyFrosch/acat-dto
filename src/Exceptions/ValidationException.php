<?php

namespace ACAT\Dto\Exceptions;

use Exception;
use ACAT\Dto\DataTransferObject;
use ACAT\Dto\Validation\ValidationResult;

class ValidationException extends Exception
{
    public function __construct(
        public DataTransferObject $dataTransferObject,
        public array $validationErrors,
    ) {
        $className = $dataTransferObject::class;

        $messages = [];

        foreach ($validationErrors as $fieldName => $errorsForField) {
            /** @var ValidationResult $errorForField */
            foreach ($errorsForField as $errorForField) {
                $messages[] = "\t - `$className->$fieldName`: $errorForField->message";
            }
        }

        parent::__construct("Validation errors:" . PHP_EOL . implode(PHP_EOL, $messages), 400);
    }
}
