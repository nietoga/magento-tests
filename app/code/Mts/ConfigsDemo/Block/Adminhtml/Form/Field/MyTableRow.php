<?php

namespace Mts\ConfigsDemo\Block\Adminhtml\Form\Field;

use Magento\Config\Block\System\Config\Form\Field\FieldArray\AbstractFieldArray;

class MyTableRow extends AbstractFieldArray
{
    protected function _prepareToRender()
    {
        $this->addColumn('key', [
            'label' => __('Key'),
            'class' => 'required-entry',
        ]);

        $this->addColumn('value', [
            'label' => __('Value'),
            'class' => 'required-entry',
        ]);

        $this->_addAfter = false;
    }
}
