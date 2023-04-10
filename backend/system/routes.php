<?php

namespace System;

use Exception;

class Routes {

    /**
     * @var array<Object\route>
     */
    private array $routes;

    public function __construct($routes) {
        $this->routes = $routes;
    }

    /**
     * Checks and executes the requested route in the http request
     *
     * @return array
     * @throws Exception
     */
    public function processRequest(): array
    {
        $routeRequest = substr(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), 1);
        $methodRequest = $_SERVER['REQUEST_METHOD'];

        foreach($this->routes as $route) {
            if($methodRequest != $route->getHttpMethod())
                continue;

            if(!preg_match('/{.+}/', $route->getRoute())) {
                if($routeRequest == $route->getRoute()) {
                    $controller = new ($route->getController())();
                    return call_user_func([$controller, $route->getMethod()]);
                }
            }
            else {
                $explodeRoute = explode('/', $route->getRoute());
                $explodeRouteRequest = explode('/', $routeRequest);

                if(count($explodeRoute) != count($explodeRouteRequest))
                    continue;

                $valuesParameters = [];
                foreach($explodeRoute as $index => $partRoute) {
                    if(preg_match('/^{.+}$/', $partRoute))
                        $valuesParameters[] = $explodeRouteRequest[$index];
                    else if($partRoute != $explodeRouteRequest[$index])
                        continue 2;
                }

                $controller = new ($route->getController())();
                return call_user_func_array([$controller, $route->getMethod()], $valuesParameters);
            }
        }

        throw new Exception("Route does not exist", 404);
    }
}