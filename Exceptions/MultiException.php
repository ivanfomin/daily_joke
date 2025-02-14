<?php

namespace Exceptions;

class MultiException extends \Exception implements \Iterator
{
    protected array $data = [];

    public function add($item)
    {
        $this->data[] = $item;
    }

    public function current(): mixed
    {
        return current($this->data);
    }

    public function next(): void
    {
        next($this->data);
    }

    public function key(): mixed
    {
        return key($this->data);
    }

    public function valid(): bool
    {
        return null !== key($this->data);
    }

    public function rewind(): void
    {
        reset($this->data);
    }

    public function count()
    {
        return count($this->data);
    }

}
