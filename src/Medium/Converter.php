<?php

namespace Donnie\PhpTest\Medium;

use Donnie\PhpTest\Medium\Contracts\Unit;

interface Converter
{
    public function convertTo(Unit $from, Unit $to): Unit;
}
