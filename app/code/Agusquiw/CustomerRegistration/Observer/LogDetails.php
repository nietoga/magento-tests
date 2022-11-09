<?php

declare(strict_types=1);

namespace Agusquiw\CustomerRegistration\Observer;

use Agusquiw\CustomerRegistration\Model\Logger;
use Magento\Customer\Api\Data\CustomerInterface;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class LogDetails implements ObserverInterface
{
    private Logger $logger;

    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    public function execute(Observer $observer)
    {
        /** @var CustomerInterface $customer */
        $customer = $observer->getData('customer');

        $data = [
            'timestamp' => $customer->getCreatedAt(),
            'email' => $customer->getEmail(),
            'first_name' => $customer->getFirstname(),
            'last_name' => $customer->getLastname(),
        ];

        $this->logger->info("New account created:\n" . json_encode($data, JSON_PRETTY_PRINT));
    }
}
