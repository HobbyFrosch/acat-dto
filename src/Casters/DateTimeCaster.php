<?php

namespace ACAT\Dto\Casters;

use DateTime;
use ACAT\Dto\Caster;
use DateTimeImmutable;
use ACAT\Dto\Exceptions\InvalidCasterClass;

/**
 *
 */
class DateTimeCaster implements Caster {

    /**
     * @var string|null
     */
    private ?string $format;

    /**
     * @param mixed $types
     * @param string|null $format
     */
    public function __construct(mixed $types, ?string $format = null) {
        $this->format = $format;
    }

    /**
     * @param mixed $value
     * @return DateTime
     * @throws InvalidCasterClass
     */
    public function cast(mixed $value) : DateTime {
        if ($this->format && ($dateTime = DateTime::createFromFormat($this->format, $value))) {
            return $dateTime;
        }
        throw new InvalidCasterClass('no or wrong format');
    }
}
