<?php

require_once(__DIR__ . "/../bootstrap.php");

class UserController
{
    public function index()
    {
        if ($_SESSION['auth']) {
            $view = new View();
        $view->render('index');
        } else {
            redirect('/login');
        }        
    }

    public function login()
    {
        if ($_SESSION['auth']) {
            redirect('/');
        } else {
            $view = new View();
            $view->render('login');
        }
    }

    public function logout()
    {
        unset($_SESSION['auth']);
        redirect('/login');
    }

    public function verify()
    {
        $user = new User();
        $user->setEmail($_POST['email']);
        $user->setPassword($_POST['password']);
        
        if (Auth::login($user)) {
            redirect('/');
        } else {
            redirect('/login');
        }
        
    }
    
    public function register()
    {
        if ($_SESSION['auth']) {
            redirect('/');
        } else {
            $view = new View();
            $view->render('register');
        }
    }

    public function create()
    {
        $db = new Db();
        $res = $db->findUserByEmail($_POST['email']);

        if ($res) {
            $_SESSION['old_name'] = $_POST['name'];
            $_SESSION['old_email'] = $_POST['email'];
            $_SESSION['flash'] = 'Пользователь с таким e-mail уже существует.';
            redirect('/register');
            return;
        }

        if ($_POST['name'] === '' || $_POST['email'] === '' || $_POST['password'] === '') {
            redirect('/register');
            return;
        }

        if ($_POST['password'] === $_POST['passwordcheck']) {
            $user = new User();
            $user->setName($_POST['name'])->setEmail($_POST['email'])->setPassword($_POST['password']);

            $db = new Db();
            $db->registerUser($user);

            $view = new View();
            $view->render('login', [
                'msg' => 'Вы зарегистрировались. Теперь можете войти.'
            ]);
        } else {
            $view = new View();
            $view->render('register', [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'msg' => 'Пароли не совпадают.',
            ]);
        }
    }
}