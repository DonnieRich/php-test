<?php

namespace Donnie\PhpTest\Simple;

class Converter
{
    private int $precision;

    public function __construct()
    {
        $this->precision = 2;
    }

    public function getPrecision(): int
    {
        return $this->precision;
    }

    public function setPrecision(int $precision)
    {
        $this->precision = $precision;
    }

    public function toLB(float $value): float
    {
        return floatval(number_format($value / 0.45359237, $this->precision, '.', ''));
    }
}
