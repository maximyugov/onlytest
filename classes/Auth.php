<?php

require_once(__DIR__ . "/../bootstrap.php");

class Auth
{
    public function register(User $user)
    {

    }

    public static function login(string $name, string $password): bool
    {
        //find user and return true or false
        $db = new Db();
        return false;
    }

    public function isUser(User $user): bool
    {
        return true;
    }
}