<?php

require_once('bootstrap.php');

session_start();

function run()
{
    $router = new Router();
    $view = $router->matchView();
}

run();