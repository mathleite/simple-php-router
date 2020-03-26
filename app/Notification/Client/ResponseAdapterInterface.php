<?php


namespace App\Notification\Client;


interface ResponseAdapterInterface
{
    public function getResponse(): array;
}
