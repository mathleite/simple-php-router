<?php


namespace App\Notification\Slack;


use App\Notification\AppNotificationInterface;
use App\Notification\Client\HttpClientAdapterInterface;
use Psr\Http\Message\ResponseInterface;

final class SlackNotification implements AppNotificationInterface
{
    private SlackStylizedMessageCreator $message;
    private HttpClientAdapterInterface $client;

    public function __construct(HttpClientAdapterInterface $client, string $message, string $messageType)
    {
        $this->message = new SlackStylizedMessageCreator($message, $messageType);
        $this->client  = $client;
    }

    public function notify(): ResponseInterface
    {
        return $this->client->post(
            getenv('SLACK_API_WEBHOOK'),
            $this->message->getStructuredMessage()
        );
    }
}
