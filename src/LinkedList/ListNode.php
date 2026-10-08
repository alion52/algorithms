<?php

namespace Algorithms\LinkedList;

class ListNode
{
    public mixed $val;
    public ?ListNode $next = null;

    public function __construct(mixed $val = 0, ?ListNode $next = null)
    {
        $this->val = $val;
        $this->next = $next;
    }
}
