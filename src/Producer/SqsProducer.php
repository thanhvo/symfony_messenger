<?php

namespace App\Producer;

use App\Message\Message;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Messenger\MessageBusInterface;

/**
 * Class SqsProducer
 * @package App\Command
 */
class SqsProducer extends Command
{
    protected static $defaultName = 'app:message:dispatcher';

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
        $this->setDescription('Dispatch a message to the configured queuing system');
        parent::__construct(self::$defaultName);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $message = new Message('A message');
        $message->setContent(date('Y-m-d H:i:s') . ' here is my content');
        $this->messageBus->dispatch($message);

        $io->success('Message dispatched successfully!');

        return 0;
    }
}
