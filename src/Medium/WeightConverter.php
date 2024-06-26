<?php

namespace Donnie\PhpTest\Medium;

use Donnie\PhpTest\Medium\Contracts\Unit;
use Donnie\PhpTest\Medium\Converter;
use Donnie\PhpTest\Medium\Contracts\Weight;
use Exception;

class WeightConverter implements Converter
{
    public function convertTo(Unit $from, Unit $to): Weight
    {
        if (!$from instanceof Weight || !$to instanceof Weight) {
            throw new Exception("Units must be of Weight type");
        }

        echo "Converting {$from->getClassName()} to {$to->getClassName()}";

        $ratio = $from->getRatio($to);

        if ($ratio->getOperation() === "/") {
            $to->setValue($from->getValue() / $ratio->getRatio());
        } else {
            $to->setValue($from->getValue() * $ratio->getRatio());
        }

        return $to;
    }
}
