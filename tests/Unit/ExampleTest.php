<?php

use Donnie\PhpTest\Utils\Calculator;

describe('testing sum', function () {

    it('can make basic addition', function () {

        $result = (new Calculator())->add(1, 2);

        expect($result)->toBe(3);
    });

    it('can make complex addition', function () {
        $result = (new Calculator())->add(7.5, 2);

        expect($result)->toBe(9.5);
    });
});

describe('testing subtraction', function () {

    it('can make a negative subtraction', function () {

        $result = (new Calculator())->sub(1, 2);

        expect($result)->toBe(-1);
    });

    it('can make a float subtraction', function () {

        $result = (new Calculator())->sub(5.5, 2);

        expect($result)->toBe(3.5);
    });
});
