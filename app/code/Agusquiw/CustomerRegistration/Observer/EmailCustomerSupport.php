<?php

declare(strict_types=1);

namespace Agusquiw\CustomerRegistration\Observer;

use Magento\Customer\Api\Data\CustomerInterface;
use Magento\Email\Model\Template\SenderResolver;
use Magento\Framework\App\Area;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\MailException;
use Magento\Framework\Mail\Template\TransportBuilder;

class EmailCustomerSupport implements ObserverInterface
{
    const CUSTOMER_REGISTRATION_NOTIFICATION_EMAIL_TEMPLATE = 'agusquiw_customer_registration_email_template';

    private TransportBuilder $transportBuilder;
    private SenderResolver $senderResolver;

    public function __construct(TransportBuilder $transportBuilder, SenderResolver $senderResolver)
    {
        $this->transportBuilder = $transportBuilder;
        $this->senderResolver = $senderResolver;
    }

    public function execute(Observer $observer)
    {
        /** @var CustomerInterface $customer */
        $customer = $observer->getData('customer');

        $variables = [
            'customer' => [
                'first_name' => $customer->getFirstname(),
                'last_name' => $customer->getLastname(),
                'email' => $customer->getEmail(),
            ],
        ];

        try {
            $transport = $this->transportBuilder
                ->setFromByScope('general')
                ->addTo($this->getCustomerSupportEmail())
                ->setTemplateOptions([
                    'area' => Area::AREA_FRONTEND,
                    'store' => $customer->getStoreId(),
                ])
                ->setTemplateIdentifier(self::CUSTOMER_REGISTRATION_NOTIFICATION_EMAIL_TEMPLATE)
                ->setTemplateVars($variables)
                ->getTransport();

            $transport->sendMessage();
        } catch (MailException | LocalizedException $exception) {
            // TODO: Add custom error handling. Couldn't send the email.
        }
    }

    /**
     * @throws MailException
     */
    private function getCustomerSupportEmail(): string
    {
        $customerSupport = $this->senderResolver->resolve('support');
        return $customerSupport['email'];
    }
}
