<?php

namespace Agusquiw\FreeShipping\CustomerData;

class FreeShipping implements \Magento\Customer\CustomerData\SectionSourceInterface
{
    private \Magento\Customer\Model\Session $customerSession;

    public function __construct(\Magento\Customer\Model\Session $customerSession)
    {
        $this->customerSession = $customerSession;
    }

    public function getSectionData()
    {
        if ($this->customerSession->isLoggedIn() && $this->isFreeShippingCustomer($this->customerSession->getCustomer())) {
            return ['messages' => [__('Free Shipping')]];
        }

        return ['messages' => []];
    }

    private function isFreeShippingCustomer(\Magento\Customer\Model\Customer $customer): bool
    {
        return preg_match('/@gmail\.com$/', $customer->getEmail());
    }
}
