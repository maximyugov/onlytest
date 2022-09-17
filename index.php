<?php

require 'bootstrap.php';

session_start();
if (!isset($_SESSION['auth'])) {
    $_SESSION['auth'] = false;
}

function run()
{
    $router = new App\Router();
    $view = $router->matchView();
}

run();