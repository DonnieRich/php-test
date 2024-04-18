<?php

require __DIR__ . '/../vendor/autoload.php';

use Donnie\PhpTest\Utils\Calculator;
use Donnie\PhpTest\Medium\Units\Kg;
use Donnie\PhpTest\Medium\Units\Lb;
use Donnie\PhpTest\Medium\Units\Mt;
use Donnie\PhpTest\Medium\WeightConverter;

use Donnie\PhpTest\Connector\RestConnector;
use Donnie\PhpTest\Connector\Services;
use Donnie\PhpTest\Connector\Services\DummyJson;
use Donnie\PhpTest\Connector\Services\Mockaroo;
use Donnie\PhpTest\Connector\Services\Mock;

// $calculator = new Calculator();

// echo $calculator->add(1, 2);


// $kg = new Kg(1);
// $lb = (new WeightConverter)->convertTo($kg, (new Lb()));

// echo $lb->getValue();
// WeightConverter::convertTo($kg, (new Mt()));
// $kg->setValue(100);
// $kg->setConverter(new WeightConverter);
// $lb = $kg->convertTo($lb);
// echo $lb->getValue();

// $result = $kg->setValue(500)->setConverter(new WeightConverter())->convertTo((new Lb()))->getValue();
// var_dump($result);


$mockarooService = new Mockaroo("https://my.api.mockaroo.com/products.json", "b68cbc40");

$dummyjsonService = new DummyJson("https://dummyjson.com/products/category/smartphones");

$mockService = new Mock(['value' => 5]);

$restConnector = new RestConnector($mockarooService);
$result = $restConnector->getData();
var_dump($result);
echo "<br>";

$restConnector->setConnection($dummyjsonService);
$result = $restConnector->getData();
var_dump($result);
echo "<br>";

$restConnector->setConnection($mockService);
$result = $restConnector->getData();
var_dump($result);
