<?php

namespace Agusquiw\Warehouse\Service;

class WarehouseService
{
    /**
     * @var \Magento\Framework\Config\Data $warehouseData
     */
    protected $warehouseData;

    /**
     * @var \Magento\Framework\Config\Data $warehouseData
     */
    public function __construct(\Magento\Framework\Config\Data $warehouseData)
    {
        $this->warehouseData = $warehouseData;
    }

    /**
     * @return array
     */
    public function getWarehouses()
    {
        return $this->warehouseData->get('warehouses');
    }
}
