<?php

namespace Donnie\PhpTest\Medium\Units;

use Donnie\PhpTest\Medium\Converter;
use Donnie\PhpTest\Medium\Contracts\Unit;

abstract class BaseUnit implements Unit
{
    private float $value;
    protected Converter $converter;

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
        return $this;
    }

    public function getClassName(): string
    {
        return strtoupper(str_replace(__NAMESPACE__ . '\\', '', static::class));
    }

    abstract public function getConverter(): Converter;
    abstract public function setConverter(Converter $converter);
}
