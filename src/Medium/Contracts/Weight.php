<?php

namespace Donnie\PhpTest\Medium\Contracts;

use Donnie\PhpTest\Medium\Contracts\Unit;
use Donnie\PhpTest\Medium\Helpers\Ratio;
use Donnie\PhpTest\Medium\Units\BaseUnit;

abstract class Weight extends BaseUnit implements Unit
{
    protected Ratio $KGTOLB;

    function __construct(float $_value = 0)
    {
        parent::__construct($_value);
        $this->KGTOLB = new Ratio("/", 0.45359237);
    }
}
