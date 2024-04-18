<?php

namespace Donnie\PhpTest\Connector\Services;

abstract class Service
{
    protected string $baseURL;
    protected string $apiKey;

    protected function setBaseUrl(string $_url)
    {
        $this->baseURL = $_url;
    }

    protected function setApiKey(string $_key)
    {
        $this->apiKey = $_key;
    }

    abstract public function callService(array $params = []);
}
