<?php

require('vendor/autoload.php');
require('config/config.php');
require('src/Helpers/helper.php');

#use App\Router;

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