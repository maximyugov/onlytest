<?php

require 'bootstrap.php';

session_start();
if (!isset($_SESSION['auth'])) {
    $_SESSION['auth'] = false;
}

function run(): void
{
    $router = new Onlytest\Router();
    $view = $router->matchView();
}

run();