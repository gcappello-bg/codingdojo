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
        $numbers = $this->normalizeDelimiterInString(
            $numbers,
            $this->extractDelimiter($numbers)
        );

        return array_sum(explode(self::DEFAULT_DELIMITER, $numbers));
    }

    /**
     * @param string $numbers
     * @return bool|string
     */
    private function extractDelimiter(string $numbers)
    {
        $delimiter = PHP_EOL;
        if (strpos($numbers, '//') !== false) {
            $delimiter = substr($numbers, 2, 1);
        }
        return $delimiter;
    }

    /**
     * @param string $numbers
     * @param $delimiter
     * @return mixed
     */
    private function normalizeDelimiterInString(string $numbers, $delimiter): string
    {
        return (string) str_replace(
            $delimiter,
            self::DEFAULT_DELIMITER,
            $numbers
        );
    }
}