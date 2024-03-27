<?php


use Donnie\PhpTest\Kata\VersionManager;

it("testInitialization", function () {
    try {
        $this->assertSame("0.0.1", (new VersionManager())->release());
        $this->assertSame("0.0.1", (new VersionManager(""))->release());
        $this->assertSame("1.2.3", (new VersionManager("1.2.3"))->release());
        $this->assertSame("1.2.3", (new VersionManager("1.2.3.4"))->release());
        $this->assertSame("1.2.3", (new VersionManager("1.2.3.d"))->release());
        $this->assertSame("1.0.0", (new VersionManager("1"))->release());
        $this->assertSame("1.1.0", (new VersionManager("1.1"))->release());
    } catch (Exception $e) {
        $this->fail();
    }
});

it("testMajorReleases", function () {
    try {
        $this->assertSame("1.0.0", (new VersionManager())->major()->release());
        $this->assertSame("2.0.0", (new VersionManager("1.2.3"))->major()->release());
        $this->assertSame("3.0.0", (new VersionManager("1.2.3"))->major()->major()->release());
    } catch (Exception $e) {
        $this->fail();
    }
});

it("testMinorReleases", function () {
    try {
        $this->assertSame("0.1.0", (new VersionManager())->minor()->release());
        $this->assertSame("1.3.0", (new VersionManager("1.2.3"))->minor()->release());
        $this->assertSame("1.1.0", (new VersionManager("1"))->minor()->release());
        $this->assertSame("4.2.0", (new VersionManager("4"))->minor()->minor()->release());
    } catch (Exception $e) {
        $this->fail();
    }
});

it("testPatchReleases", function () {
    try {
        $this->assertSame("0.0.2", (new VersionManager())->patch()->release());
        $this->assertSame("1.2.4", (new VersionManager("1.2.3"))->patch()->release());
        $this->assertSame("4.0.2", (new VersionManager("4"))->patch()->patch()->release());
    } catch (Exception $e) {
        $this->fail();
    }
});

it("testRollbacks", function () {
    try {
        $this->assertSame("0.0.1", (new VersionManager())->major()->rollback()->release());
        $this->assertSame("0.0.1", (new VersionManager())->minor()->rollback()->release());
        $this->assertSame("0.0.1", (new VersionManager())->patch()->rollback()->release());
        $this->assertSame("1.0.0", (new VersionManager())->major()->patch()->rollback()->release());
        $this->assertSame("1.0.0", (new VersionManager())->major()->patch()->rollback()->major()->rollback()->release());
    } catch (Exception $e) {
        $this->fail();
    }
});

it("testSeperatedCalls", function () {
    try {
        $vm = new VersionManager("1.2.3");
        $vm->major();
        $vm->minor();
        $this->assertSame("2.1.0", $vm->release());
    } catch (Exception $e) {
        $this->fail();
    }
});

describe("testExceptions", function () {

    it("fails while parsing version", function () {
        new VersionManager("a.b.c");
        $this->fail("Expected an Exception to be thrown");
    })->throws('Error occured while parsing version!');

    it("fails rollback if no previous version are available", function () {
        (new VersionManager())->rollback();
        $this->fail("Expected an Exception to be thrown");
    })->throws('Cannot rollback!');
});

it("randomTest1", function () {
    try {
        $vm = new VersionManager("1.2.3");
        $vm->major();
        $vm->minor();
        $vm->rollback();
        $this->assertSame("2.0.0", $vm->release());
    } catch (Exception $e) {
        $this->fail();
    }
});

it("randomTest2", function () {
    try {
        $vm = new VersionManager("10.0.33");
        $vm->minor();
        $vm->rollback();
        $vm->patch();
        $this->assertSame("10.0.34", $vm->release());
    } catch (Exception $e) {
        $this->fail();
    }
});

it("randomTest3", function () {
    $this->assertSame("89.1.0", (new VersionManager("88"))->major()->patch()->patch()->patch()->rollback()->minor()->major()->rollback()->release());
});

it("randomTest4", function () {
    $vm = (new VersionManager("34.5.99"))->patch()->patch();
    $newVm = $vm->rollback()->rollback()->minor()->minor()->minor()->minor()->minor()->minor()->minor()->minor()->minor();
    $this->assertSame("34.14.0", $newVm->release());
});

it("randomTest5", function () {
    (new VersionManager("34.5.99"))->rollback();
})->throws('Cannot rollback!');

it("randomTest6", function () {
    $this->assertSame("0.55.2", (new VersionManager("0.55.0"))->patch()->patch()->patch()->rollback()->minor()->rollback()->release());
});

it("randomTest7", function () {
    $this->assertSame("0.0.3", (new VersionManager("00.0.000000000000000"))->patch()->patch()->patch()->rollback()->minor()->rollback()->release());
});
