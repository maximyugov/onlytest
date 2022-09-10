<?php

require_once(__DIR__ . "/../bootstrap.php");

class UserController
{
    public function index()
    {
        $user = new User();
        $user->setName('Username');
        $view = new View();
        $view->render('index', ['user' => $user]);
    }

    public function login()
    {
        $view = new View();
        $view->render('login');
    }

    public function verify()
    {
        $login = $_POST['login'];
        $password = $_POST['password'];
        if (Auth::login($login, $password)) {
            redirect('/');
        } else {
            redirect('/login');
        }
        
    }
    
    public function register()
    {
        $view = new View();
        $view->render('register');
    }
}