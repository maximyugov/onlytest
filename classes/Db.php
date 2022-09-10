<?php

require_once(__DIR__ . "/../bootstrap.php");

class Db
{
    public function __construct()
    {

    }

    public function storeUser(User $user)
    {

    }

    public function getUser(string $name, string $password)
    {
        $auth = new Auth();
        $password = $auth->passwordHash($password);
        //connect to db and find user by name and email and create $user = new User
        if (!$user) {
            return false;
        }

        return $user;
    }
}