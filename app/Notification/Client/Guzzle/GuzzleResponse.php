<?php


namespace App\Notification\Client\Guzzle;


use App\Notification\Client\ResponseAdapterInterface;
use Psr\Http\Message\ResponseInterface;

class GuzzleResponse implements ResponseAdapterInterface
{
    private ResponseInterface $clientResponse;

    public function __construct(ResponseInterface $clientResponse)
    {
        $this->clientResponse = $clientResponse;
    }

    public function getResponse(): array
    {
        return self::sanitizeResponse($this->clientResponse);
    }

    private static function sanitizeResponse(ResponseInterface $guzzleResponse): array
    {
        return [
            'status_code' => $guzzleResponse->getStatusCode(),
            'message'     => $guzzleResponse->getReasonPhrase()
        ];
    }
}
