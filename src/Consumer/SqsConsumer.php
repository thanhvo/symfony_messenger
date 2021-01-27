<?php

namespace App\Consumer;

use App\Message\Message;
use Bref\Logger\StderrLogger as StderrLogger;
use Psr\Log\LogLevel;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class SqsConsumer implements MessageHandlerInterface
{
    public function __invoke(Message $message)
    {
        $log = new StderrLogger(LogLevel::DEBUG);
        $log->debug('Message from SQS queue: '.$message->getContent());
        dump($message);
    }
}