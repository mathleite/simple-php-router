<?php


namespace App\Notification\Client\Guzzle;


use App\Notification\Client\HttpClientAdapterInterface;
use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

final class GuzzleHttpClient implements HttpClientAdapterInterface
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function post(string $url, array $params): ResponseInterface
    {
        return $this->client->post(
            $url,
            [
                'json' => $params
            ]
        );
    }
}
