<?php


namespace App\Notification\Client;


interface HTTPClientAdapterInterface
{
    public function post(string $url, array $params): ResponseAdapterInterface;
}
