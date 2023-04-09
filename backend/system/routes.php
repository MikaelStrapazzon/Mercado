<?php

namespace System;

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
     * @return string
     */
    public function processRequest(): string
    {
        $routeRequest = substr(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), 1);
        $methodRequest = $_SERVER['REQUEST_METHOD'];

        foreach($this->routes as $route) {
            if($methodRequest != $route->getHttpMethod())
                continue;

            if(!preg_match('/{.+}/', $route->getRoute())) {
                if($routeRequest == $route->getRoute())
                    return call_user_func([$route->getController(), $route->getMethod()]);
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

                return call_user_func_array([$route->getController(), $route->getMethod()], $valuesParameters);
            }
        }

        return 'Route does not exist';
    }
}