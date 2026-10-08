<?php

namespace Algorithms\Tests\LinkedList;

use Algorithms\LinkedList\CycleDetector;
use Algorithms\LinkedList\ListNode;
use PHPUnit\Framework\TestCase;

class CycleDetectorTest extends TestCase
{
    public function testNoCycle(): void
    {
        $a = new ListNode(1);
        $b = new ListNode(2);
        $c = new ListNode(3);
        $a->next = $b;
        $b->next = $c;

        $this->assertFalse(CycleDetector::hasCycle($a));
        $this->assertNull(CycleDetector::detectCycleStart($a));
    }

    public function testHasCycle(): void
    {
        $a = new ListNode(1);
        $b = new ListNode(2);
        $c = new ListNode(3);
        $a->next = $b;
        $b->next = $c;
        $c->next = $b;

        $this->assertTrue(CycleDetector::hasCycle($a));
        $this->assertSame($b, CycleDetector::detectCycleStart($a));
    }
}
