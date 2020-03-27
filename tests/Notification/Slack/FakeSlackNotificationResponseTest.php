<?php

namespace App\Test\Notification\Slack;

use App\Notification\Client\HTTPResponseInterface;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

require_once 'app/DotEnvLoader/index.php';

class FakeSlackNotificationResponseTest extends TestCase
{
    public static function test_FakeSlackNotificationResponse_ShouldAssertHTTPResponse(): void
    {
        $notificationResponse = new Response(
            $statusCode = 200,
            $responseHeader = [],
            $responseBody = null,
            $protocolVersion = '1.1',
            $responseReason = 'OK'
        );

        $fakerResponse = new FakeSlackNotificationResponse($notificationResponse);

        $expectedResponse = [
            'status_code' => 200,
            'message'     => 'OK',
        ];

        Assert::assertInstanceOf(HTTPResponseInterface::class, $fakerResponse);
        Assert::assertEquals($expectedResponse, $fakerResponse->getResponse());
    }
}
