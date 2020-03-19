<?php


namespace App\Notification;

/**
 * Class MessageTypeEnum
 *
 * @package App\Notification
 * @method static int NOT_FOUND()
 */
final class StatusCodeEnum
{
    private const NOT_FOUND = 404;

    public static function __callStatic($name, $arguments): int
    {
        return constant('self::' . $name);
    }
}
