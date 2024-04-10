<?php

namespace Donnie\PhpTest\Medium\Units;

use Donnie\PhpTest\Medium\Contracts\Weight;
use Donnie\PhpTest\Medium\BaseUnit;

class Kg extends BaseUnit implements Weight
{
    private float $ratioLb = 0.45359237;
    private string $operationLb = "/";

    /*public function convertTo(Weight $unit): Weight
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
        return "Kg";
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
