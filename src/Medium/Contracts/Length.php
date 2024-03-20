<?php

namespace Donnie\PhpTest\Medium\Contracts;

interface Length extends BaseUnit
{
    public function convertTo(Length $unit): Length;
}
