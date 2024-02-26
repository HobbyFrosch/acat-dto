<?php

namespace ACAT\Dto\Tests\Reflection;

use ACAT\Dto\Dto;
use ACAT\Dto\Reflection\DataTransferObjectClass;
use ACAT\Dto\Tests\TestCase;

class DataTransferObjectClassTest extends TestCase
{
    /** @test */
    public function test_public_properties()
    {
        $dto = new class () extends Dto {
            public $foo;

            public static $bar;

            private $baz;

            protected $boo;
        };

        $class = new DataTransferObjectClass($dto);

        $this->assertCount(1, $class->getProperties());
        $this->assertEquals('foo', $class->getProperties()[0]->name);
    }
}
