<?php

require_once('bootstrap.php');

session_start();
if (!isset($_SESSION['auth'])) {
    $_SESSION['auth'] = false;
}

function run()
{
    $router = new Router();
    $view = $router->matchView();
}

run();