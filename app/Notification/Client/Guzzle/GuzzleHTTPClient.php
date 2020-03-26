<?php


namespace App\Notification\Client\Guzzle;


use App\Notification\Client\HTTPClientAdapterInterface;
use App\Notification\Client\ResponseAdapterInterface;
use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

class GuzzleHTTPClient implements HTTPClientAdapterInterface
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function post(string $url, array $params): ResponseAdapterInterface
    {
        $clientResponse = $this->client->post(
            $url,
            [
                'json' => $params
            ]
        );

        return new GuzzleResponse($clientResponse);
    }
}
