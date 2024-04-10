<?php

namespace Donnie\PhpTest\Medium;

use Donnie\PhpTest\Medium\Contracts\Unit;

abstract class Converter
{
    abstract public static function convertTo(Unit $from, Unit $to): Unit;
}
