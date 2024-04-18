<?php

namespace Donnie\PhpTest\Connector\Services;

use CurlHandle;
use Donnie\PhpTest\Connector\Services\Service;

class Mockaroo extends Service
{

    private CurlHandle $curl;

    public function __construct($_url, $_apiKey)
    {
        $this->setBaseUrl($_url);
        $this->setApiKey($_apiKey);
        $this->setCurl();
        $this->setCurlReturnOnTransfer();
    }

    private function setCurl()
    {
        $this->curl = curl_init();
        curl_setopt($this->curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, 0);
    }

    private function setCurlParams(array $params)
    {
        $params['key'] = $this->apiKey;
        $encodedParams = http_build_query($params);
        $url = "{$this->baseURL}?{$encodedParams}";

        curl_setopt($this->curl, CURLOPT_URL, $url);
    }


    private function setCurlReturnOnTransfer()
    {
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
    }

    public function callService(array $params = [])
    {
        $this->setCurlParams($params);

        $result = curl_exec($this->curl);
        curl_close($this->curl);


        if ($result === false) {
            throw new \Exception(curl_error($this->curl), curl_errno($this->curl));
        }

        return $result;
    }
}
