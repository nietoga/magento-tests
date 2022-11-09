<?php

declare(strict_types=1);

namespace Agusquiw\Contact\Plugin\Model\MailInterface;

use Psr\Log\LoggerInterface;

class LogAfterSend
{
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function afterSend() : void
    {
        $this->logger->info('New contact request has been received.');
    }
}
