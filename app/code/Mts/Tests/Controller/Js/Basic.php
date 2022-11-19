<?php

declare(strict_types=1);

namespace Mts\Tests\Controller\Js;

use Magento\Framework\App\ActionInterface;
use Magento\Framework\Controller\ResultFactory;

class Basic implements ActionInterface
{
    private ResultFactory $resultFactory;

    public function __construct(ResultFactory $resultFactory)
    {
        $this->resultFactory = $resultFactory;
    }

    public function execute()
    {
        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}
