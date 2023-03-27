<?php

namespace Onlytest;

use Onlytest\Controllers\UserController;
use Onlytest\Router;

Router::get('/', [UserController::class, 'index']);

Router::post('/register', [UserController::class, 'register']);
Router::post('/create', [UserController::class, 'create']);
Router::post('/login', [UserController::class, 'login']);
Router::post('/logout', [UserController::class, 'logout']);

Router::post('/verify', [UserController::class, 'verify']);