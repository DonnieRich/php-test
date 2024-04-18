<?php

namespace Donnie\PhpTest\Connector\Services;

use  CurlHandle;

class DummyJson extends Service
{
    private CurlHandle $curl;

    public function __construct(string $_url)
    {
        $this->setBaseUrl($_url);
        $this->setCurl();
        $this->setCurlReturnOnTransfer();
    }

    private function setCurl()
    {
        $this->curl = curl_init($this->baseURL);
        curl_setopt($this->curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, 0);
    }

    private function setCurlParams(array $params)
    {
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
        // if ($params) {
        //     $this->setCurlParams($params);
        // }

        $result = curl_exec($this->curl);
        curl_close($this->curl);

        if ($result === false) {
            throw new \Exception(curl_error($this->curl), curl_errno($this->curl));
        }

        return $result;
    }
}
