<?php

namespace ACAT\Dto\Tests;

use ACAT\Dto\Dto;

class CasterWithDataTransferObjectsTest extends TestCase
{
    /** @test */
    public function test_with_nested_dtos()
    {
        $dtoA = new DtoA([
            'dtoB' => [
                'dtoC' => [
                    'name' => 'test',
                ],
            ],
        ]);

        $this->assertEquals('test', $dtoA->dtoB->dtoC->name);
    }
}

class DtoA extends Dto
{
    public DtoB $dtoB;
}

class DtoB extends Dto
{
    public DtoC $dtoC;
}

class DtoC extends Dto
{
    public string $name;
}
