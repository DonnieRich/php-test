<?php

use Donnie\PhpTest\Utils\StringFinder;

describe('String finder', function () {

    it('can find a string portion (ABCDE) between two small indexes (3, 5)', function () {

        $result = (new StringFinder)->find('ABCDE', 3, 5);

        expect($result)->toBe('DEA');
    });

    it('can find a string portion (ABCDE) between two big indexes (9, 11)', function () {

        $result = (new StringFinder)->find('ABCDE', 9, 11);

        expect($result)->toBe('EAB');
    });

    it('can find a string portion (ABCDE) between two big indexes (90, 110)', function () {

        $result = (new StringFinder)->find('ABCDE', 90, 110);

        expect($result)->toBe('ABCDEABCDEABCDEABCDEA');
    });
});
