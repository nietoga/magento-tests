<?php

declare(strict_types=1);

namespace Mts\ConfigsDemo\Model\Config\Source;

use Magento\Framework\Data\OptionSourceInterface;

class MySelect implements OptionSourceInterface
{
    public function toOptionArray(): array
    {
        return [
            ['label' => 'None :)', 'value' => ''],
            ['label' => 'Option 1', 'value' => 'opt1'],
            ['label' => 'Option 2', 'value' => 'opt2'],
        ];
    }
}
