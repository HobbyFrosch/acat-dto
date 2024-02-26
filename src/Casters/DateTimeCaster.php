<?php

namespace ACAT\Dto\Casters;

use ACAT\Dto\Caster;
use DateTimeImmutable;
use TheSeer\Tokenizer\Exception;
use ACAT\Dto\Exceptions\InvalidCasterClass;

/**
 *
 */
class DateTimeCaster implements Caster {

    /**
     * @var string|null
     */
    private ?string $format = null;

    /**
     * @param mixed $types
     * @param string|null $format
     */
    public function __construct(mixed $types, ?string $format) {
        $this->format = $format;
    }

    /**
     * @param mixed $value
     * @return DateTimeImmutable
     * @throws InvalidCasterClass
     */
    public function cast(mixed $value) : DateTimeImmutable {
        if ($this->format && ($dateTime = DateTimeImmutable::createFromFormat($this->format, $value))) {
            return $dateTime;
        }
        throw new InvalidCasterClass('no or wrong format');
    }
}
