<?php

namespace Donnie\PhpTest\Medium\Units;

use Donnie\PhpTest\Medium\Contracts\Length;
use Donnie\PhpTest\Medium\BaseUnit;

class Mt extends BaseUnit implements Length
{
    // TODO: fix ratio and operation
    private float $ratioMl = 0.45359237;
    private string $operationMl = "/";

    /*public function convertTo(Length $unit): Length
    {
        $ratio = $this->getRatio($unit->getClassName());
        $operation = $this->getOperation($unit->getClassName());

        if ($operation === "/") {
            $unit->setValue($this->getValue() / $ratio);
        } else {
            $unit->setValue($this->getValue() * $ratio);
        }

        return $unit;
    }*/

    public function getClassName(): string
    {
        return "Mt";
    }

    public function getRatio(string $unit): float
    {
        $ratio = "ratio$unit";
        return $this->{$ratio};
    }

    public function getOperation(string $unit): string
    {
        $operation = "operation$unit";
        return $this->{$operation};
    }
}
