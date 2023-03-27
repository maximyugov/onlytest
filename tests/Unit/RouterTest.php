<?php

use Onlytest\Controllers\UserController;
use Onlytest\Router;
use PHPUnit\Framework\TestCase;

class RouterTest extends TestCase
{
    /**
     * @doesNotPerformAssertions 
     */
    public function del_test_router()
    {
        $router = new Router();
        $router->matchView('/test');
    }

    public function test_add_get_route()
    {
        Router::get('/route', [UserController::class, function() {
            return 'route';
        }]);

        $this->assertNotEmpty(Router::$routes);

        $this->assertTrue(is_callable(Router::$routes[0]['fn']));
        
        $this->assertEquals('GET', Router::$routes[0]['http_method']);
        $this->assertEquals('/route', Router::$routes[0]['route']);
        $this->assertEquals('Onlytest\Controllers\UserController', Router::$routes[0]['controller']);

        $this->assertEquals('route', Router::match('/route'));
    }

    public function test_add_post_route()
    {
        Router::post('/route', [UserController::class, function() {
            return 'route';
        }]);

        $this->assertNotEmpty(Router::$routes);

        $this->assertTrue(is_callable(Router::$routes[1]['fn']));
        
        $this->assertEquals('POST', Router::$routes[1]['http_method']);
        $this->assertEquals('/route', Router::$routes[1]['route']);
        $this->assertEquals('Onlytest\Controllers\UserController', Router::$routes[1]['controller']);

        $this->assertEquals('route', Router::match('/route'));
    }

    public function test_controller_method_executed()
    {
        Router::get('/test', [UserController::class, 'test']);

        $this->assertEquals('test', Router::match('/test'));
    }
}