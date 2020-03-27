<?php

namespace App\Test\Notification\Slack;

use App\Test\Notification\Fake\FakeHttpClient;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class FakeNotificationResponseTest extends TestCase
{
    public static function test_FakeHttpClient_ShouldAssertHttpResponse(): void
    {
        $notificationResponse = new Response(
            $statusCode = 200,
            $responseHeader = [],
            $responseBody = null,
            $protocolVersion = '1.1',
            $responseReason = 'OK'
        );

        $fakeClient = new FakeHttpClient();
        $fakeClient->mockResponse($notificationResponse);

        $response = $fakeClient->post($fakeUrl = 'https://fake.com', $emptyParams = []);

        Assert::assertEquals($expectedStatusCodeResponse = 200, $response->getStatusCode());
        Assert::assertEquals($expectedPhraseResponse = 'OK', $response->getReasonPhrase());
    }
}
