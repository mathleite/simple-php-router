<?php


namespace App\Notification\Slack;


use App\Notification\AppNotificationInterface;
use App\Notification\Client\HTTPClientAdapterInterface;
use App\Notification\Client\ResponseAdapterInterface;

final class SlackNotification implements AppNotificationInterface
{
    private SlackStylizedMessageCreator $message;
    private HTTPClientAdapterInterface $client;

    public function __construct(HTTPClientAdapterInterface $client, string $message, string $messageType)
    {
        $this->message = new SlackStylizedMessageCreator($message, $messageType);
        $this->client  = $client;
    }

    public function notify(): ResponseAdapterInterface
    {
        return $this->client->post(
            getenv('SLACK_API_WEBHOOK'),
            $this->message->getStructuredMessage()
        );
    }
}
