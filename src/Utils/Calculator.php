<?php

namespace Donnie\PhpTest\Utils;


class Calculator
{
    public function add(int|float $param1, int|float $param2): int|float
    {
        return $param1 + $param2;
    }

    public function sub(int|float $param1, int|float $param2): int|float
    {
        return $param1 - $param2;
    }
}
