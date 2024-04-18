<?php

namespace Donnie\PhpTest\Connector;

use Donnie\PhpTest\Connector\Contracts\Connector;
use Donnie\PhpTest\Connector\Services\Service;

class RestConnector implements Connector
{
    private Service $service;

    public function __construct(Service $_service)
    {
        $this->setConnection($_service);
    }

    public function setConnection(Service $service)
    {
        $this->service = $service;
    }

    public function getData()
    {
        $data = $this->service->callService();
        return $data;
    }
}
