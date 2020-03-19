<?php


namespace App\Slack;


use App\Notification\AppNotification;
use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

final class SlackNotification implements AppNotification
{
    private SlackStylizedMessageCreator $message;

    public function __construct(string $message, string $messageType)
    {
        $this->message = new SlackStylizedMessageCreator($message, $messageType);
    }

    public function notify(): ResponseInterface
    {
        return (new Client())->post(getenv('SLACK_API_WEBHOOK'), [
            'json' => $this->message->getMessageStructure()
        ]);
    }
}
