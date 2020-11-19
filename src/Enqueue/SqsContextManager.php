<?php

namespace App\Enqueue;

use Enqueue\Sqs\SqsContext;

class SqsContextManager implements ContextManager
{
    private SqsContext $context;

    public function __construct(SqsContext $context)
    {
        $this->context = $context;
    }

    /**
     * {@inheritdoc}
     */
    public function context(): SqsContext
    {
        return $this->context;
    }

    /**
     * {@inheritdoc}
     */
    public function recoverException(\Exception $exception, array $destination): bool
    {
        if (404 === $exception->getCode()) {
            return $this->ensureExists($destination);
        }
        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function ensureExists(array $destination): bool
    {
        $queue = $this->context->createQueue($destination['queue']);
        $queue->setRegion('eu-central-1');
        $this->context->declareQueue($queue);
        return true;
    }
}