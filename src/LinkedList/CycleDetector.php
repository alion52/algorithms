<?php

namespace Algorithms\LinkedList;

class CycleDetector
{
    /**
     * Определяет, есть ли цикл в односвязном списке.
     * Алгоритм Флойда («черепаха и заяц»).
     * Сложность: O(n) по времени, O(1) по памяти.
     */
    public static function hasCycle(?ListNode $head): bool
    {
        if ($head === null || $head->next === null) {
            return false;
        }

        $slow = $head;
        $fast = $head;

        while ($fast !== null && $fast->next !== null) {
            $slow = $slow->next;
            $fast = $fast->next->next;

            if ($slow === $fast) {
                return true;
            }
        }

        return false;
    }

    /**
     * Возвращает узел, с которого начинается цикл.
     * Если цикла нет — null.
     */
    public static function detectCycleStart(?ListNode $head): ?ListNode
    {
        if ($head === null || $head->next === null) {
            return null;
        }

        $slow = $head;
        $fast = $head;

        while ($fast !== null && $fast->next !== null) {
            $slow = $slow->next;
            $fast = $fast->next->next;

            if ($slow === $fast) {
                $slow = $head;
                while ($slow !== $fast) {
                    $slow = $slow->next;
                    $fast = $fast->next;
                }
                return $slow;
            }
        }

        return null;
    }
}
