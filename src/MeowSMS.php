<?php

namespace k1ttyf\MeowSms;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;

class MeowSMS
{
    protected Client $client;

    /** @var string */
    private string $api_key;

    /** @var string */
    private string $api_url = "https://vinted.gay/api/";

    public function __construct(string $api_key)
    {
        $this->api_key = $api_key;
        $this->client = new Client([
            "verify" => false,
            "http_errors" => false,
            "timeout" => 10,
            "connect_timeout" => 10
        ]);
    }

    private function validateBody(string $body): array
    {
        if (!isset($body)) {
            return [
                "result" => false,
                "error" => "Сервер вернул пустой результат. Отпишите администратору для решение этой проблемы."
            ];
        } elseif (str_contains($body, "1020")) {
            return [
                "result" => false,
                "error" => "Ваш IP-адрес не добавлен в WhiteList. Отпишите администратору для решение этой проблемы."
            ];
        } else {
            $outputJson = json_decode($body, true);
            return is_array($outputJson) ? $outputJson : [
                "result" => false,
                "Произошла ошибка при конвертации JSON в массив. Отпишите администратору для решение этой проблемы."
            ];
        }
    }

    /**
     * @throws GuzzleException
     */
    private function sendRequest(string $action, array $args): array
    {
        $args["api_key"] = $this->api_key;
        $url = sprintf(
            '%s%s?%s',
            $this->api_url,
            $action,
            http_build_query($args)
        );
        $request = new Request("GET", $url);
        $sendAsync = $this->client->sendAsync($request)->wait();
        return $this->validateBody($sendAsync->getBody());
    }

    /**
     * @throws GuzzleException  
     */
    public function sendSMS(array $args): array
    {
        return $this->sendRequest("sendSMS", $args);
    }

    /**
     * @throws GuzzleException
     */
    public function sendCustomSMS(array $args): array
    {
        return $this->sendRequest("sendCustomSMS", $args);
    }

    /**
     * @throws GuzzleException
     */
    public function cuttLink(array $args): array
    {
        return $this->sendRequest("cuttLink", $args);
    }

    /**
     * @throws GuzzleException
     */
    public function checkDomainStatus(array $args): array
    {
        return $this->sendRequest("checkDomainStatus", $args);
    }

    /**
     * @throws GuzzleException
     */
    public function getBalance(): array
    {
        return $this->sendRequest("getBalance");
    }

    /**
     * @throws GuzzleException
     */
    public function getServices(): array
    {
        return $this->sendRequest("getServices");
    }

    /**
     * @throws GuzzleException
     */
    public function getCountries(): array
    {
        return $this->sendRequest("getCountries");
    }

}
