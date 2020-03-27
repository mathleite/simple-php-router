<?php


namespace App\Notification;


use App\Notification\Client\HTTPClientAdapterInterface;
use App\Notification\Client\HTTPResponseInterface;

interface AppNotificationInterface
{
    public function __construct(HTTPClientAdapterInterface $client, string $message, string $messageType);

    public function notify(): HTTPResponseInterface;
}
