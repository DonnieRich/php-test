<?php

namespace Donnie\PhpTest\Medium\Units;

abstract class BaseUnit
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

    public function getClassName(): string
    {
        return strtoupper(str_replace(__NAMESPACE__ . '\\', '', static::class));
    }
}
