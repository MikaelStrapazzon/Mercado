<?php

namespace System\Object;

class route {
    private string $route;
    private string $httpMethod;
    private string $controller;
    private string $method;

    /**
     * A system route
     * @param string $url
     * @param string $httpMethod
     * @param string $controller controller that will be executed
     * @param string $method controller method that will be executed
     */
    public function __construct(string $url, string $httpMethod, string $controller, string $method) {
        $this->route = $url;
        $this->httpMethod = $httpMethod;
        $this->controller = $controller;
        $this->method = $method;
    }

    public function getRoute(): string
    {
        return $this->route;
    }

    public function getHttpMethod(): string
    {
        return $this->httpMethod;
    }

    public function getController(): string
    {
        return $this->controller;
    }

    public function getMethod(): string
    {
        return $this->method;
    }
}