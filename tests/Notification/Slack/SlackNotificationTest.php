<?php

namespace App\Test\Notification\Slack;

use App\Notification\NotificationTypeEnum;
use App\Notification\Slack\SlackNotification;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

require_once 'app/DotEnvLoader/index.php';

class SlackNotificationTest extends TestCase
{
    /**
     * @group notification
     */
    public static function test_SlackNotification_ShouldNotify(): void
    {
        $notification         = new SlackNotification($notifyText = 'Test Notification', $messageType = NotificationTypeEnum::ERROR());
        $notificationResponse = $notification->notify();

        $expectedStatusCodeOK = 200;
        $expectedReasonPhrase = 'OK';

        Assert::assertEquals($expectedStatusCodeOK, $notificationResponse->getStatusCode());
        Assert::assertEquals($expectedReasonPhrase, $notificationResponse->getReasonPhrase());
    }
}
