<?php
declare(strict_types=1);

namespace Mts\VirtualLogger\Cron;

use Magento\Framework\Stdlib\DateTime\DateTime;
use Psr\Log\LoggerInterface;

class TimeLogger
{
    private LoggerInterface $logger;

    private DateTime $dateTime;

    public function __construct(
        LoggerInterface $logger,
        DateTime $dateTime
    ) {
        $this->logger = $logger;
        $this->dateTime = $dateTime;
    }

    public function logCurrentTime(): void
    {
        $this->logger->debug($this->getCurrentTime());
    }

    private function getCurrentTime(): string
    {
        return $this->dateTime->date();
    }
}
