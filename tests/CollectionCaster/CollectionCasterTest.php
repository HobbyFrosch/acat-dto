<?php

namespace ACAT\Dto\Tests\CollectionCaster;

use Illuminate\Support\Collection;
use ACAT\Dto\Attributes\CastWith;
use ACAT\Dto\Caster;
use ACAT\Dto\Dto;
use ACAT\Dto\Tests\TestCase;

class CollectionCasterTest extends TestCase
{
    /** @test */
    public function test_collection_caster()
    {
        $bar = new Bar([
            'collectionOfFoo' => [
                ['name' => 'a'],
                ['name' => 'b'],
                ['name' => 'c'],
            ],
        ]);

        $this->assertCount(3, $bar->collectionOfFoo);
        $this->assertInstanceOf(Foo::class, $bar->collectionOfFoo[0]);
    }
}

class Bar extends Dto
{
    #[CastWith(FooCollectionCaster::class)]
    public CollectionOfFoo $collectionOfFoo;
}

class Foo extends Dto
{
    public string $name;
}

class CollectionOfFoo extends Collection
{
    public function offsetGet($key): Foo
    {
        return parent::offsetGet($key);
    }
}

class FooCollectionCaster implements Caster
{
    public function cast(mixed $value): CollectionOfFoo
    {
        return new CollectionOfFoo(array_map(
            fn (array $data) => new Foo(...$data),
            $value
        ));
    }
}
