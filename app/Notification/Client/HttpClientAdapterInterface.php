<?php


namespace App\Notification\Client;


use Psr\Http\Message\ResponseInterface;

interface HttpClientAdapterInterface
{
    public function post(string $url, array $params): ResponseInterface;
}
