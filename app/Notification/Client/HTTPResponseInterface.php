<?php


namespace App\Notification\Client;


use Psr\Http\Message\ResponseInterface;

interface HTTPResponseInterface
{
    public function __construct(ResponseInterface $clientResponse);

    public function getResponse(): array;
}
