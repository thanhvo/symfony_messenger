<?php declare(strict_types=1);

namespace App\Consumer;

use Bref\Context\Context;
use Bref\Event\Sqs\SqsEvent;
use Bref\Event\Sqs\SqsHandler;
use Bref\Logger\StderrLogger;

class SqsConsumer extends SqsHandler
{
    public function handleSqs(SqsEvent $event, Context $context): void
    {
        $log = new StderrLogger();
        $log->warning('Calling handleSqs!');
        foreach ($event->getRecords() as $record) {
            $log->warning($record->getBody());
        }
    }
}

return new SqsConsumer();
