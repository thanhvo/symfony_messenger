<?php declare(strict_types=1);

namespace App\Consumer;

use Bref\Context\Context;
use Bref\Event\Sqs\SqsEvent;
use Bref\Event\Sqs\SqsHandler;
use Bref\Symfony\Messenger\Service\BusDriver;

class SqsConsumer extends SqsHandler
{

    public function __construct() {}

    public function handleSqs(SqsEvent $event, Context $context): void
    {
        foreach ($event->getRecords() as $record) {
            dump($record->getBody());
        }
    }
}
