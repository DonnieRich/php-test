<?php

namespace Donnie\PhpTest\Medium\Contracts;

use Donnie\PhpTest\Medium\Units\BaseUnit;
use Donnie\PhpTest\Medium\Helpers\Ratio;

abstract class Length extends BaseUnit implements Unit
{

    function __construct(float $_value = 0)
    {
        parent::__construct($_value);
    }
}
