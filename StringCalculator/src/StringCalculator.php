<?php

namespace CodingDojo\StringCalculator;

class StringCalculator
{
    const DEFAULT_DELIMITER = ',';

    /**
     * @param string $numbers
     * @return int
     */
    public function add(string $numbers): int
    {

        $numbers = str_replace(
            PHP_EOL,
            self::DEFAULT_DELIMITER,
            $numbers
        );


        return array_sum(explode(self::DEFAULT_DELIMITER, $numbers));
    }
}