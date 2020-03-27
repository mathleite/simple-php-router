<?php


namespace App\Notification;


use App\Notification\Client\HttpClientAdapterInterface;
use Psr\Http\Message\ResponseInterface;

interface AppNotificationInterface
{
    public function __construct(HttpClientAdapterInterface $client, string $message, string $messageType);

    public function notify(): ResponseInterface;
}
