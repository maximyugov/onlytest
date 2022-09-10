<?php

require_once('bootstrap.php');

function run()
{
    $router = new Router();
    $view = $router->matchView();
    #include('views/' . $view . '.tpl.php');
}

run();