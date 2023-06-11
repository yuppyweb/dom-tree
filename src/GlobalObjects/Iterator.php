<?php

declare(strict_types=1);

namespace DOMTree\GlobalObjects;

use IteratorAggregate;
use Traversable;

final class Iterator implements IteratorAggregate
{
    private array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function getIterator(): Traversable
    {
        yield from $this->data;
    }

    /**
     * @return object{value: mixed, done: bool}
     */
    public function next(): object
    {
        $currentValue = current($this->data);

        return (object)[
            'value' => $currentValue === false ? null : $currentValue,
            'done' => next($this->data) === false
        ];
    }
}
