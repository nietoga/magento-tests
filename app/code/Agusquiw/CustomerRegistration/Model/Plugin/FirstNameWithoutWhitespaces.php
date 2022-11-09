<?php

declare(strict_types=1);

namespace Agusquiw\CustomerRegistration\Model\Plugin;

use Magento\Customer\Api\Data\CustomerInterface;
use Magento\Customer\Model\AccountManagement;

class FirstNameWithoutWhitespaces
{
    public function beforeCreateAccount(AccountManagement $subject, CustomerInterface $customer)
    {
        $firstName = $customer->getFirstname();
        $firstName = preg_replace('/\s+/', '', $firstName);
        $customer->setFirstname($firstName);
    }
}
