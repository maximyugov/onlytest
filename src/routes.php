<?php

namespace Onlytest;

use Onlytest\Controllers\UserController;
use Onlytest\Router;

Router::get('/', [UserController::class, 'index']);

Router::get('/register', [UserController::class, 'registerForm']);
Router::post('/register', [UserController::class, 'createUser']);
Router::get('/login', [UserController::class, 'loginForm']);
Router::post('/login', [UserController::class, 'loginUser']);
Router::post('/logout', [UserController::class, 'logoutUser']);
