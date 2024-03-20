<?php

namespace Donnie\PhpTest\Utils;

class StringFinder
{
    public function find(string $string, int $start, int $end): string
    {
        $result = '';
        for ($i = $start; $i <= $end; $i++) {

            $position = $i % strlen($string);

            $result .= substr($string, $position, 1);
        }

        return $result;
    }
}
