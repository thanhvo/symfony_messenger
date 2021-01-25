<?php

namespace App\Producer;

use App\Message\Message;
use Bref\Context\Context;
use Bref\Event\Handler;
use Symfony\Component\Messenger\MessageBusInterface;

/**
 * Class SqsProducer
 * @package App\Producer
 */
class SqsProducer implements Handler
{
    /**
     * @var MessageBusInterface
     */
    private $messageBus;

    /**
     * SqsProducer constructor.
     */
    public function __construct(MessageBusInterface $messageBus)
    {
        $this->messageBus = $messageBus;
    }

    public function handle($event, Context $context)
    {
        $message = new Message('A message');
        $message->setContent(date('Y-m-d H:i:s') . ' here is my content');
        $this->messageBus->dispatch($message);
        echo "The message is dipatched successfully";
        return 0;
    }
}
