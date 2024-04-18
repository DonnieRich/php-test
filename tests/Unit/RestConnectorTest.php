<?php

use Donnie\PhpTest\Connector\RestConnector;
use Donnie\PhpTest\Connector\Services\Mock;
use Donnie\PhpTest\Connector\Services\Mockaroo;
use Donnie\PhpTest\Connector\Services\Service;
use Mockery;

describe("RestConnector", function () {

    it("should call callService method", function () {
        $mockService = Mockery::mock(Mock::class);
        $mockService->shouldReceive('callService')->once();

        $connector = new RestConnector($mockService);
        $connector->getData();
    });

    it("should get data from callService method", function () {
        $connector = new RestConnector(new Mock([
            "products" => [
                [
                    "name" => "iPhone",
                    "description" => "A good smartphone",
                    "price" => 599.99
                ],
                [
                    "name" => "Honor",
                    "description" => "A good, less expensive smartphone",
                    "price" => 299.99
                ],
            ]
        ]));

        $result = $connector->getData();

        expect($result)->json()->toHaveKey("products");
        expect($result)->json()->products->{0}->name->toBe("iPhone");
    });

    it("should use only Service instances", function () {
        expect("Donnie\PhpTest\Connector\Services")->toExtend("Donnie\PhpTest\Connector\Services\Service");
    });
});
