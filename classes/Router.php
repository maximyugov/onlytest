<?php

require_once(__DIR__ . "/../bootstrap.php");

class Router
{
    private $routes = [
        '/' => 'index',
        '/login' => 'login',
        '/register' => 'register',
    ];
    
    public function matchView(): string
    {
        $path = $_SERVER['REQUEST_URI'];
        if (array_key_exists($path, $this->routes)) {
            $view = $path;
        } else {
            $this->redirect(404);
        }
        
        return $view;
    }

    public function redirect(int $code = 404): void
    {
        header("HTTP/1.1 404 Not Found");
        die();
    }
}