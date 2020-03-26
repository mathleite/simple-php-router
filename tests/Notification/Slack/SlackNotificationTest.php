<?php

namespace App\Test\Notification\Slack;

use App\Notification\Client\Guzzle\GuzzleHTTPClient;
use App\Notification\Client\ResponseAdapterInterface;
use App\Notification\NotificationTypeEnum;
use App\Notification\Slack\SlackNotification;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

require_once 'app/DotEnvLoader/index.php';

/**
 * @group notification
 */
class SlackNotificationTest extends TestCase
{
    public static function test_SlackNotificationInstance_ShouldAssertResponseAdapterInterfaceResponse(): void
    {
        $notification         = new SlackNotification(
            new GuzzleHTTPClient(),
            $notifyText = 'Test Notification',
            $messageType = NotificationTypeEnum::ERROR()
        );
        $notificationResponse = $notification->notify();

        $expectedResponse = [
            'status_code' => 200,
            'message'     => 'OK',
        ];

        Assert::assertInstanceOf(ResponseAdapterInterface::class, $notificationResponse);
        Assert::assertEquals($expectedResponse, $notificationResponse->getResponse());
    }
}
