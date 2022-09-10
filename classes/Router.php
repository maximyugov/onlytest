<?php

require_once(__DIR__ . "/../bootstrap.php");

class Router
{
    private $routes = [
        '/' => 'index',
        '/login' => 'login',
        '/register' => 'register',
    ];
    
    public function matchView(): void
    {
        
        $path = $_SERVER['REQUEST_URI'];
        
        if (array_key_exists($path, $this->routes)) {
            #$view = $this->routes[$path];
            $user = new UserController();
            call_user_func([$user, $this->routes[$path]]);
        } else {
            $this->redirect(404);
        }
        
    }

    public function redirect(int $code = 404): void
    {
        header("HTTP/1.1 404 Not Found");
        die();
    }
}