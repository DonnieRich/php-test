<?php

namespace Donnie\PhpTest\Medium\Helpers;

final class Ratio
{
    private string $operation;
    private float $ratio;

    public function __construct(string $_operation, float $_ratio)
    {
        $this->operation = $_operation;
        $this->ratio = $_ratio;
    }

    public function getOperation(): string
    {
        return $this->operation;
    }

    public function getRatio(): float
    {
        return $this->ratio;
    }
}
