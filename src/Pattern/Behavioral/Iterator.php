<?php

declare(strict_types=1);

namespace Pattern\Behavioral;

use Iterator;

interface EntityInterface {
    public function toArray();
}

abstract class CollectionAbstract implements Iterator
{
    protected array $items = [];
    protected int $key = 0;

    public function current(): EntityInterface
    {
        return $this->items[$this->key];
    }

    public function next(): void
    {
        ++$this->key;
    }

    public function key(): int
    {
        return $this->key;
    }

    public function valid(): bool
    {
        return isset($this->items[$this->key]);
    }

    public function rewind(): void
    {
        $this->key = 0;
    }

    public function add(EntityInterface $entity): void
    {
        $this->next();
        $this->items[$this->key] = $entity;
    }
}

class ShoeEntity implements EntityInterface
{
    public function __construct(
        public string $make,
        public string $model,
        public float $size,
    ) {}
}

class ShoeCollection extends CollectionAbstract {}

$shoe = new ShoeEntity('Nike', 'Pegasus 39', 11.5);
$shoeCollection = new ShoeCollection();
$shoeCollection->add($shoe);