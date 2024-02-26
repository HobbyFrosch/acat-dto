<?php

namespace ACAT\Dto\Tests\Casters;

use DateTimeImmutable;
use ACAT\Dto\Tests\TestCase;
use ACAT\Dto\DataTransferObject;
use ACAT\Dto\Attributes\CastWith;
use ACAT\Dto\Casters\DateTimeCaster;

/**
 *
 */
class DateTimeCasterTest extends TestCase {

    /**
     * @return void
     */
    public function testDateTimeCaster() : void {
        $bar = new Bar(date: '2024-01-01');
        $this->assertInstanceOf(DateTimeImmutable::class, $bar->date);
    }

}

/**
 *
 */
class Bar extends DataTransferObject {

    #[CastWith(DateTimeCaster::class, "Y-m-d")]
    public DateTimeImmutable $date;

}
