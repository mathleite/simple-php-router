<?php


namespace App\Notification\Slack;


use App\Notification\NotificationTypeEnum;
use App\Notification\StatusCodeEnum;
use InvalidArgumentException;

final class SlackStylizedMessageCreator
{
    private array $stylizedMessageStructure;

    public function __construct(string $message, string $messageType)
    {
        $this->stylizedMessageStructure = self::getSlylizedMessageByType($message, $messageType);
    }

    private static function getSlylizedMessageByType(string $message, string $messageType): array
    {
        switch ($messageType) {
            case NotificationTypeEnum::ERROR():
                return self::getErrorMessageStructure($message);
            default:
                throw new InvalidArgumentException("Invalid message type: '{$messageType}'", StatusCodeEnum::NOT_FOUND());
        }
    }

    private static function getErrorMessageStructure(string $message): array
    {
        $currentDate = date('d/m/Y H:i:s');

        return [
            'text'   => true,
            'blocks' => [
                [
                    'type' => 'section',
                    'text' => [
                        'type' => 'mrkdwn',
                        'text' => "[{$currentDate}] " . strtoupper(NotificationTypeEnum::ERROR()) . ' :this-is-fine-fire:'
                    ]
                ],
                [
                    'type' => 'section',
                    'text' => [
                        'type' => 'mrkdwn',
                        'text' => $message
                    ]
                ]
            ]
        ];
    }

    public function getMessageStructure(): array
    {
        return $this->stylizedMessageStructure;
    }
}
