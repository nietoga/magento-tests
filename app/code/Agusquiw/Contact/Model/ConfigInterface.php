<?php

namespace Agusquiw\Contact\Model;

interface ConfigInterface extends \Magento\Contact\Model\ConfigInterface
{
    const XML_PATH_CC_EMAIL = 'contact/email/cc_email';

    public function ccEmail() : string;
}
