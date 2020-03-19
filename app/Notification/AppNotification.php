<?php


namespace App\Notification;


use Psr\Http\Message\ResponseInterface;

interface AppNotification
{
    public function __construct(string $message, string $messageType);

    public function notify(): ResponseInterface;
}
