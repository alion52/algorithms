<?php

namespace Algorithms\Queue;

class CircularQueue
{
    private array $data;
    private int $head = 0;
    private int $tail = 0;
    private int $size = 0;

    public function __construct(private int $capacity)
    {
        if ($capacity <= 0) {
            throw new \InvalidArgumentException('Capacity must be positive');
        }
        $this->data = array_fill(0, $capacity, null);
    }

    public function enqueue(mixed $value): bool
    {
        if ($this->isFull()) {
            return false;
        }

        $this->data[$this->tail] = $value;
        $this->tail = ($this->tail + 1) % $this->capacity;
        $this->size++;
        return true;
    }

    public function dequeue(): mixed
    {
        if ($this->isEmpty()) {
            return null;
        }

        $value = $this->data[$this->head];
        $this->data[$this->head] = null;
        $this->head = ($this->head + 1) % $this->capacity;
        $this->size--;
        return $value;
    }

    public function front(): mixed
    {
        return $this->isEmpty() ? null : $this->data[$this->head];
    }

    public function rear(): mixed
    {
        if ($this->isEmpty()) {
            return null;
        }
        $index = ($this->tail - 1 + $this->capacity) % $this->capacity;
        return $this->data[$index];
    }

    public function isEmpty(): bool
    {
        return $this->size === 0;
    }

    public function isFull(): bool
    {
        return $this->size === $this->capacity;
    }

    public function count(): int
    {
        return $this->size;
    }
}
