<?php

declare(strict_types=1);

namespace Agusquiw\CustomerRegistration\Model;

use Psr\Log\LoggerInterface;

class Logger
{
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function info(string $message, array $context = []): void
    {
        $this->logger->info($message, $context);
    }
}
