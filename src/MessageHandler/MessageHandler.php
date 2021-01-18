<?php

namespace App\MessageHandler;

use App\Message\Message;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class MessageHandler implements MessageHandlerInterface
{
    public function __invoke(Message $message)
    {
        // ... do some work - like sending an SMS message!
        dump($message);
    }
}