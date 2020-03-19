<?php

namespace App\Test\Slack;

use App\Notification\StatusCodeEnum;
use App\Slack\SlackStylizedMessageCreator;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class SlackStylizedMessageCreatorTest extends TestCase
{
    /**
     * @dataProvider provideInvalidMessageType
     */
    public function test_InvalidArgumentException_ShouldThrowInvalidArgumentException_WhenProvidesInvalidMessageType(string $messageType): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Invalid message type: '{$messageType}'");
        $this->expectExceptionCode(StatusCodeEnum::NOT_FOUND());

        (new SlackStylizedMessageCreator($notificationMessage = 'Test Notification', $messageType));
    }

    public function provideInvalidMessageType(): iterable
    {
        //    key                               value
        yield 'type: invalidMessageType'    => ['invalidMessageType'];
        yield 'type: invalid Message Type'  => ['invalid Message Type'];
        yield 'type: 25448'                 => ['25448'];
        yield 'type: []'                    => ['[]'];
        yield 'type: {}'                    => ['{}'];
        yield 'type: null'                  => ['null'];
    }
}
