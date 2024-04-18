<?php

namespace Donnie\PhpTest\Connector\Contracts;

use Donnie\PhpTest\Connector\Services\Service;

interface Connector
{
    public function setConnection(Service $service);
    public function getData();
}
