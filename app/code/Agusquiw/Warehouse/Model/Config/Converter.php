<?php

namespace Agusquiw\Warehouse\Model\Config;

class Converter implements \Magento\Framework\Config\ConverterInterface
{
    /**
     * @inheritDoc
     */
    public function convert($source)
    {
        $warehouses = $source->getElementsByTagName('warehouse');

        $output = [];
        $iterator = 0;
        /** @var \DOMNode $warehouse */
        foreach ($warehouses as $warehouse) {
            /** @var \DOMNode $warehouseChild */
            foreach ($warehouse->childNodes as $warehouseChild) {
                if ($warehouseChild->nodeType == XML_ELEMENT_NODE) {
                    $output[$iterator][$warehouseChild->localName] = $warehouseChild->textContent;
                }
            }

            $iterator++;
        }

        return ['warehouses' => $output];
    }
}
