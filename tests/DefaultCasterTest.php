<?php

namespace ACAT\Dto\Tests;

use Attribute;
use DateTimeImmutable;
use ACAT\Dto\Attributes\DefaultCast;
use ACAT\Dto\Caster;
use ACAT\Dto\Dto;

class DefaultCasterTest extends TestCase
{
    /** @test */
    public function property_is_casted()
    {
        $dto = new DtoWithDefaultCaster(date: '2020-01-01');

        $this->markTestSucceeded();
    }

    /** @test */
    public function child_property_is_casted()
    {
        $dto = new ChildDto(date: '2020-01-01');

        $this->markTestSucceeded();
    }
}

#[DefaultCast(DateTimeImmutable::class, DateTimeImmutableCaster::class)]
class DtoWithDefaultCaster extends Dto
{
    public DateTimeImmutable $date;
}

#[DefaultCast(DateTimeImmutable::class, DateTimeImmutableCaster::class)]
abstract class AbstractWithDefaultCaster extends Dto
{
}

class ChildDto extends AbstractWithDefaultCaster
{
    public DateTimeImmutable $date;
}

#[Attribute(Attribute::TARGET_CLASS | Attribute::TARGET_METHOD)]
class DateTimeImmutableCaster implements Caster
{
    /**
     * @param string|mixed $value
     *
     * @return DateTimeImmutable
     */
    public function cast(mixed $value): DateTimeImmutable
    {
        return DateTimeImmutable::createFromFormat('Y-m-d', $value);
    }
}
