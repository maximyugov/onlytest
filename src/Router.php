<?php

namespace Onlytest;

use Onlytest\Controllers\UserController;

class Router
{
    public static array $routes = [];

    public function matchView(string $path): void
    {
        if (array_key_exists($path, $this->routes)) {
            $user = new UserController();
            call_user_func([$user, $this->routes[$path]]);
        } else {
            $this->redirect404();
        }        
    }

    public static function match(string $route)
    {
        foreach (self::$routes as $registeredRoute) {
            if ($route === $registeredRoute['route'] && is_callable($registeredRoute['fn'])) {
                return call_user_func($registeredRoute['fn']);
            }

            if ($route === $registeredRoute['route']) {
                $controller = new $registeredRoute['controller']();
                if (method_exists($controller, $registeredRoute['fn'])) {
                    return call_user_func([$controller, $registeredRoute['fn']]);
                }
            }
        }
    }

    public static function get(string $route, array $params)
    {
        self::registerRoute('GET', $route, $params);
    }

    public static function post(string $route, array $params)
    {
        self::registerRoute('POST', $route, $params);
    }

    private static function registerRoute(string $method, string $route, array $params)
    {
        self::$routes[] = [
            'http_method' => $method,
            'route' => $route,
            'controller' => $params[0],
            'fn' => $params[1]
        ];
    }

    public function redirect404(): void
    {
        header("HTTP/1.1 404 Not Found");
        die();
    }
}