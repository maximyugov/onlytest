<?php

require_once('bootstrap.php');

session_start();
$_SESSION['auth'] = false;

function run()
{
    $router = new Router();
    $view = $router->matchView();
}

run();