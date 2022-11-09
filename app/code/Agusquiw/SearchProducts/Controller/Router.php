<?php

declare(strict_types=1);

namespace Agusquiw\SearchProducts\Controller;

class Router implements \Magento\Framework\App\RouterInterface
{
    private \Magento\Framework\App\ActionFactory $actionFactory;

    private \Magento\Store\Model\StoreManagerInterface $storeManager;

    private \Magento\Framework\App\ResponseInterface $response;

    private array $requiredParams = ['basePath', 'categoryId'];

    public function __construct(
        \Magento\Framework\App\ActionFactory $actionFactory,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Framework\App\ResponseInterface $response
    ) {
        $this->actionFactory = $actionFactory;
        $this->storeManager = $storeManager;
        $this->response = $response;
    }

    public function match(\Magento\Framework\App\RequestInterface $request): ?\Magento\Framework\App\ActionInterface
    {
        $params = $this->parseRequest($request);

        $basePath = $params['basePath'];
        $categoryId = $params['categoryId'];

        if (!empty($basePath) && $basePath === 'search-products') {
            $this->response->setRedirect('/catalog/category/view/id/' . $categoryId);
            return $this->actionFactory->create(\Magento\Framework\App\Action\Redirect::class);
        }

        return null;
    }

    private function parseRequest(\Magento\Framework\App\RequestInterface $request)
    {
        /** @see \Magento\Framework\App\Router\Base::parseRequest */
        $output = [];

        $path = trim($request->getPathInfo(), '/');

        $params = explode('/', $path ? $path : $this->pathConfig->getDefaultPath());
        foreach ($this->requiredParams as $paramName) {
            $output[$paramName] = array_shift($params);
        }

        for ($i = 0, $l = count($params); $i < $l; $i += 2) {
            $output['variables'][$params[$i]] = isset($params[$i + 1]) ? urldecode($params[$i + 1]) : '';
        }
        return $output;
    }
}
