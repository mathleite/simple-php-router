<?php


namespace App\Test\Notification\Fake;


use App\Notification\Client\HttpClientAdapterInterface;
use Psr\Http\Message\ResponseInterface;

class FakeHttpClient implements HttpClientAdapterInterface
{
    private ResponseInterface $response;

    public function mockResponse(ResponseInterface $response): void
    {
        $this->response = $response;
    }

    public function post(string $url, array $params): ResponseInterface
    {
       return $this->response;
    }
}
