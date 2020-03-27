<?php


namespace App\Test\Notification\Slack;


use App\Notification\Client\Guzzle\HTTPResponse;
use App\Notification\Client\HTTPResponseInterface;
use Psr\Http\Message\ResponseInterface;

class FakeSlackNotificationResponse implements HTTPResponseInterface
{
    private ResponseInterface $response;

    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;
    }

    public function getResponse(): array
    {
        return (new HTTPResponse($this->response))->getResponse();
    }
}
