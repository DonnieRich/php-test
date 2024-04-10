<?php

namespace Donnie\PhpTest\Medium\Units;

use Donnie\PhpTest\Medium\Contracts\Length;
use Donnie\PhpTest\Medium\Contracts\Unit;
use Donnie\PhpTest\Medium\Helpers\Ratio;

class Mt extends Length
{
    public function getRatio(Unit $unit): Ratio
    {
        $ratio = "{$this->getClassName()}TO{$unit->getClassName()}";
        return $this->$ratio;
    }
}
