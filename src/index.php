<?php

require __DIR__ . '/../vendor/autoload.php';

use Donnie\PhpTest\Utils\Calculator;
use Donnie\PhpTest\Medium\Units\Kg;
use Donnie\PhpTest\Medium\Units\Lb;
use Donnie\PhpTest\Medium\Units\Mt;
use Donnie\PhpTest\Medium\WeightConverter;

// $calculator = new Calculator();

// echo $calculator->add(1, 2);


$kg = new Kg(1);
$lb = (new WeightConverter)->convertTo($kg, (new Lb()));
// echo $lb->getValue();
// WeightConverter::convertTo($kg, (new Mt()));
// $kg->setValue(100);
// $kg->setConverter(new WeightConverter);
// $lb = $kg->convertTo($lb);
// echo $lb->getValue();
$result = $kg->setValue(500)->setConverter(new WeightConverter())->convertTo((new Lb()))->getValue();
var_dump($result);
