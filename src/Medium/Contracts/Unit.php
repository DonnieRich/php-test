<?php

namespace Donnie\PhpTest\Medium\Contracts;

use Donnie\PhpTest\Medium\Helpers\Ratio;

interface Unit
{
    public function getValue(): float;
    public function setValue(float $_value);
    public function getClassName(): string;
    public function getRatio(Unit $unit): Ratio;
}
