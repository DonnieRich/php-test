<?php

namespace Donnie\PhpTest\Medium\Contracts;

interface BaseUnit
{
    public function getValue(): float;
    public function setValue(float $_value);
    public function getClassName(): string;
}
