<?php

namespace CodingDojo\StringCalculator;

class StringCalculator
{
    /**
     * @param string $numbers
     * @return int
     */
    public function add(string $numbers): int
    {
        if (strpos($numbers, "\n")) {
            return array_sum(explode("\n", $numbers));
        }
        return array_sum(explode(',', $numbers));
    }
}