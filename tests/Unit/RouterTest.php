<?php

use Onlytest\Router;
use PHPUnit\Framework\TestCase;

class RouterTest extends TestCase
{
    /**
     * @doesNotPerformAssertions 
     */
    public function test_router()
    {
        $router = new Router();
        $router->matchView('/test');
    }
}