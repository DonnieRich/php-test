<?php

namespace Donnie\PhpTest\Medium\Contracts;

use Donnie\PhpTest\Medium\Contracts\Unit;
use Donnie\PhpTest\Medium\Converter;
use Donnie\PhpTest\Medium\Helpers\Ratio;
use Donnie\PhpTest\Medium\Units\BaseUnit;
use Donnie\PhpTest\Medium\WeightConverter;

abstract class Weight extends BaseUnit
{
    protected Ratio $KGTOLB;
    protected Ratio $LBTOKG;
    // protected Converter $converter;

    function __construct(float $_value = 0)
    {
        parent::__construct($_value);
        $this->KGTOLB = new Ratio("/", 0.45359237);
        $this->LBTOKG = new Ratio("*", 0.45359237);

        // $this->converter = new WeightConverter();
        // $this->setConverter($_converter);
    }

    public function getConverter(): WeightConverter
    {
        return $this->converter;
    }

    public function setConverter(Converter $converter)
    {
        $this->converter = $converter;
        return $this;
    }
}
