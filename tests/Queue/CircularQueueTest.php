<?php

namespace Algorithms\Tests\Queue;

use Algorithms\Queue\CircularQueue;
use PHPUnit\Framework\TestCase;

class CircularQueueTest extends TestCase
{
    public function testEnqueueDequeue(): void
    {
        $q = new CircularQueue(3);
        $this->assertTrue($q->enqueue(1));
        $this->assertTrue($q->enqueue(2));
        $this->assertSame(1, $q->dequeue());
        $this->assertSame(2, $q->dequeue());
        $this->assertNull($q->dequeue());
    }

    public function testIsFull(): void
    {
        $q = new CircularQueue(2);
        $q->enqueue(1);
        $q->enqueue(2);
        $this->assertTrue($q->isFull());
        $this->assertFalse($q->enqueue(3));
    }

    public function testWrapAround(): void
    {
        $q = new CircularQueue(3);
        $q->enqueue(1);
        $q->enqueue(2);
        $q->dequeue();
        $q->enqueue(3);
        $this->assertSame(2, $q->front());
        $this->assertSame(3, $q->rear());
    }
}
