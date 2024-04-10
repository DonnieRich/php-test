<?php

require __DIR__ . '/../vendor/autoload.php';

use Donnie\PhpTest\Utils\Calculator;
use Donnie\PhpTest\Medium\Units\Kg;
use Donnie\PhpTest\Medium\Units\Lb;
use Donnie\PhpTest\Medium\Units\Mt;
use Donnie\PhpTest\Medium\WeightConverter;

// $calculator = new Calculator();

// echo $calculator->add(1, 2);
/*
$kg = new Kg(1);
$lb = $kg->convertTo((new Lb()));

echo "{$kg->getValue()}{$kg->getClassName()} equals {$lb->getValue()}{$lb->getClassName()}";

echo "<br>";

echo "{$lb->getValue()}{$lb->getClassName()} equals {$kg->getValue()}{$kg->getClassName()}";

echo "<br>";

$mt = new Mt(100);
$newLb = $mt->convertTo((new Lb()));
echo "{$mt->getValue()}{$mt->getClassName()} equals {$newLb->getValue()}{$newLb->getClassName()}";
*/

$kg = new Kg(1);
WeightConverter::convertTo($kg, (new Lb()));
WeightConverter::convertTo($kg, (new Mt()));
