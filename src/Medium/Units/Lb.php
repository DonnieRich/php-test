<?php

namespace Donnie\PhpTest\Medium\Units;

use Donnie\PhpTest\Medium\Contracts\Weight;
use Donnie\PhpTest\Medium\BaseUnit;
use Donnie\PhpTest\Medium\Contracts\Unit;
use Donnie\PhpTest\Medium\Helpers\Ratio;

class Lb extends Weight
{
    public function getRatio(Unit $unit): Ratio
    {
        $ratio = "{$this->getClassName()}TO{$unit->getClassName()}";
        return $this->$ratio;
    }

    public function convertTo(Unit $to): Weight
    {
        return $this->getConverter()->convertTo($this, $to);
    }
}
