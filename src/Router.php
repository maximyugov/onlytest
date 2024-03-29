<?php

namespace Onlytest;

use Onlytest\Controllers\UserController;

class Router
{
    private array $routes = [
        '/' => 'index',
        '/login' => 'login',
        '/verify' => 'verify',
        '/register' => 'register',
        '/create' => 'create',
        '/logout' => 'logout',
        '/test' => 'test',
    ];

    public function __construct()
    {
        // $this->controller = $controller;
    }
    
    public function matchView(string $path): void
    {
        if (array_key_exists($path, $this->routes)) {
            $user = new UserController();
            call_user_func([$user, $this->routes[$path]]);
        } else {
            $this->redirect404();
        }        
    }

    public function redirect404(): void
    {
        header("HTTP/1.1 404 Not Found");
        die();
    }
}