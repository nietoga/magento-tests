<?php

declare(strict_types=1);

namespace Mts\ConfigsDemo\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Serialize\Serializer\Json;

class Config
{
    const XML_PATH_MY_BOOLEAN_CONFIG = 'mts/configs_demo/my_boolean';

    const XML_PATH_MY_INTEGER_CONFIG = 'mts/configs_demo/my_integer';

    const XML_PATH_MY_SELECT_CONFIG = 'mts/configs_demo/my_select';

    const XML_PATH_MY_STRING_CONFIG = 'mts/configs_demo/my_string';

    const XML_PATH_MY_TABLE_CONFIG = 'mts/configs_demo/my_table';

    const XML_PATH_MY_PASSWORD_CONFIG = 'mts/configs_demo/my_password';

    private ScopeConfigInterface $scopeConfig;

    private Json $jsonSerializer;

    public function __construct(ScopeConfigInterface $scopeConfig, Json $jsonSerializer)
    {
        $this->scopeConfig = $scopeConfig;
        $this->jsonSerializer = $jsonSerializer;
    }

    public function getMyBoolean(): bool
    {
        return boolval($this->scopeConfig->isSetFlag(self::XML_PATH_MY_BOOLEAN_CONFIG));
    }

    public function getMyInteger(): int
    {
        return intval($this->scopeConfig->getValue(self::XML_PATH_MY_INTEGER_CONFIG));
    }

    public function getMySelect(): string
    {
        return strval($this->scopeConfig->getValue(self::XML_PATH_MY_SELECT_CONFIG));
    }

    public function getMyString(): string
    {
        return strval($this->scopeConfig->getValue(self::XML_PATH_MY_STRING_CONFIG));
    }

    public function getMyTable(): array
    {
        $configValue = strval($this->scopeConfig->getValue(self::XML_PATH_MY_TABLE_CONFIG));

        if (empty($configValue)) {
            return [];
        }

        $config = $this->jsonSerializer->unserialize($configValue);

        /*
            Further processing is possible, using the "keys"
            to create a map instead of using just a plain array
        */
        return array_values($config);
    }

    public function getMyPassword(): string
    {
        return strval($this->scopeConfig->getValue(self::XML_PATH_MY_PASSWORD_CONFIG));
    }
}
