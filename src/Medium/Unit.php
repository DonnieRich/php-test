<?php

namespace Donnie\PhpTest\Medium;

use Donnie\PhpTest\Medium\Contracts\BaseUnit;

abstract class Unit
{
    private float $value;

    public function __construct(float $_value = 0)
    {
        $this->setValue($_value);
    }

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
}
