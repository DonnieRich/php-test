<?php

namespace Donnie\PhpTest\Connector\Services;

class Mock extends Service
{

    private array $results;

    public function __construct(array $_results)
    {
        $this->results = $_results;
    }

    public function callService(array $params = [])
    {
        if ($params) {
            $this->results['params'] = $params;
        }

        return json_encode($this->results);
    }
}
