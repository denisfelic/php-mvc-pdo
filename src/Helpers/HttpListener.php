<?php


namespace Denis\MVC\Helpers;


use Denis\MVC\Controllers\Controller;

class HttpListener
{

    /**
     * @param string $requestUri
     * @param string $httpMethod
     * @param array $rotas
     *
     */
    public function listen(string $requestUri, string $httpMethod, array $rotas)
    {
        $cleanUri = $this->uriCleaner($requestUri);
        $this->httpRequest($cleanUri, $rotas, $httpMethod);
    }

    /**
     * @param string $requestUri
     * @param $array
     * @return bool
     */
    private function routeExist(string $requestUri, $array): bool
    {
        return array_key_exists($requestUri, $array);
    }

    /**
     * @param string $requestUri
     * @param $rotas
     * @param string $httpMethod
     */
    private function httpRequest(string $requestUri, $rotas, string $httpMethod): void
    {
        if (!$this->routeExist($requestUri, $rotas[$httpMethod])) {
            echo 'Oops! erro 404';
            die();
        }

        $this->runController($rotas, $httpMethod, $requestUri);
    }


    /**
     * @param $rotas
     * @param string $httpMethod
     * @param string $requestUri
     */
    private function runController($rotas, string $httpMethod, string $requestUri): void
    {
        $controllerClass = $rotas[$httpMethod][$requestUri][0];
        $controllerMethod = $rotas[$httpMethod][$requestUri][1];

        /**
         * @var Controller $controller
         */
        $controller = new $controllerClass();
        $controller->$controllerMethod();
    }

    /**
     * @param string $requestUri
     * @return false|string
     */
    private function uriCleaner(string $requestUri)
    {
        $cleanUri = $requestUri;
        if (strpos($requestUri, '?')) {
            $cleanUri = strstr($requestUri, '?', true);
        }
        return $cleanUri;
    }
}