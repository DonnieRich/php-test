<?php

namespace Donnie\PhpTest\Medium;

use Exception;

abstract class Unit
{
    private int $precision;
    private float $value;

    public function __construct(float $_value = 0)
    {
        $this->setValue($_value);
    }

    // public function setPrecision($_precision): void
    // {
    //     if ($_precision < 0) {
    //         throw new Exception('Precision must be a positive integer');
    //     }

    //     $this->precision = $_precision;
    // }

    public function getValue(): float
    {
        return $this->value;
    }

    public function setValue(float $_value)
    {
        $this->value = $_value;
    }

    abstract function getRatio(string $unit): float;

    abstract function getOperation(string $unit): string;

    abstract function getClassName(): string;
}
