<?php

namespace Onlytest;

class UserController
{
    public function index(): void
    {
        if ($_SESSION['auth']) {
            $view = new View();
            $view->render('index');
        } else {
            redirect('/login');
        }        
    }

    public function login(): void
    {
        if ($_SESSION['auth']) {
            redirect('/');
        } else {
            $view = new View();
            $view->render('login');
        }
    }

    public function logout(): void
    {
        unset($_SESSION['auth']);
        redirect('/login');
    }

    public function verify(): void
    {
        $user = new User();
        $user->setEmail($_POST['email']);
        $user->setPassword($_POST['password']);
        
        if (Auth::login($user)) {
            redirect('/');
        } else {
            $_SESSION['old_email'] = $_POST['email'];
            $_SESSION['flash'] = 'Введите правильные логин и пароль.';
            redirect('/login');
        }
        
    }
    
    public function register(): void
    {
        if ($_SESSION['auth']) {
            redirect('/');
        } else {
            $view = new View();
            $view->render('register');
        }
    }

    public function create(): void
    {
        $db = new Db();
        $res = $db->findUserByEmail($_POST['email']);

        $_SESSION['old_name'] = $_POST['name'];
        $_SESSION['old_email'] = $_POST['email'];

        if ($res) {    
            $_SESSION['flash'] = 'Пользователь с таким e-mail уже существует.';
            redirect('/register');
            return;
        }

        if ($_POST['name'] === '' || $_POST['email'] === '' || $_POST['password'] === '') {
            $_SESSION['flash'] = 'Все поля обязательны для заполнения.';
            redirect('/register');
            return;
        }

        if ($_POST['password'] === $_POST['passwordcheck']) {
            $user = new User();
            $user->setName($_POST['name'])->setEmail($_POST['email'])->setPassword($_POST['password']);

            $db = new Db();
            $db->registerUser($user);

            $_SESSION['flash'] = 'Вы зарегистрировались. Теперь можете войти.';
            redirect('/login');
        } else {
            $_SESSION['flash'] = 'Пароли не совпадают.';
            redirect('/register');
        }
    }
}