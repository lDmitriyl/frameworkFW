<?php

namespace fw\core\type;

use ArrayAccess;
use Countable;
use IteratorAggregate;

class Dictionary implements IteratorAggregate, Countable, ArrayAccess
{
    public $items = [];

    public function getIterator()
    {
        return new \ArrayIterator($this->items);
    }

    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->items[] = $value;
        } else {
            $this->items[$offset] = $value;
        }
    }

    public function offsetExists($offset)
    {
        return isset($this->items[$offset]);
    }

    public function offsetUnset($offset)
    {
        unset($this->items[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->items[$offset] ?? null;
    }

    public function count()
    {

    }
}