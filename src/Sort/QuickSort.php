<?php

namespace Algorithms\Sort;

class QuickSort
{
    /**
     * Быстрая сортировка.
     * Сложность: O(n log n) в среднем, O(n^2) в худшем случае.
     */
    public static function sort(array $arr): array
    {
        if (count($arr) < 2) {
            return $arr;
        }

        $pivot = $arr[0];
        $left = [];
        $right = [];

        for ($i = 1, $n = count($arr); $i < $n; $i++) {
            if ($arr[$i] < $pivot) {
                $left[] = $arr[$i];
            } else {
                $right[] = $arr[$i];
            }
        }

        return array_merge(
            self::sort($left),
            [$pivot],
            self::sort($right)
        );
    }
}
