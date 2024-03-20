<?php

namespace Donnie\PhpTest\Medium\Contracts;

interface Weight extends BaseUnit
{
    public function convertTo(Weight $unit): Weight;
}
