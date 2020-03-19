<?php


namespace App\Notification;

/**
 * Class MessageTypeEnum
 *
 * @package App\Notification
 * @method static string ERROR()
 */
final class MessageTypeEnum
{
    private const ERROR = 'error';

    public static function __callStatic($name, $arguments): string
    {
        return constant('self::' . strtoupper($name));
    }
}
