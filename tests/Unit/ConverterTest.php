<?php

use Donnie\PhpTest\Simple\Converter;

describe('Weights converter', function () {

    beforeEach(function () {
        $this->weightConverter = new Converter();
    });

    it('can get decimal precision', function () {

        $result = $this->weightConverter->getPrecision();

        expect($result)->toBe(2);
    });

    it('can set decimal precision', function () {

        $this->weightConverter->setPrecision(3);
        $result = $this->weightConverter->getPrecision();

        expect($result)->toBe(3);
    });

    it('can convert KG to LB', function () {

        $result = $this->weightConverter->toLB(5);

        expect($result)->toBe(11.02);
    });

    it('can convert KG to LB returning value with 3 decimal places', function () {

        $this->weightConverter->setPrecision(3);
        $result = $this->weightConverter->toLB(5);

        expect($result)->toBe(11.023);
    });
});
