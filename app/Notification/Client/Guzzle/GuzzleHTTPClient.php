<?php


namespace App\Notification\Client\Guzzle;


use App\Notification\Client\HTTPClientAdapterInterface;
use App\Notification\Client\HTTPResponseInterface;
use GuzzleHttp\Client;

class GuzzleHTTPClient implements HTTPClientAdapterInterface
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function post(string $url, array $params): HTTPResponseInterface
    {
        $guzzleResponse = $this->client->post(
            $url,
            [
                'json' => $params
            ]
        );

        return new HTTPResponse($guzzleResponse);
    }
}
