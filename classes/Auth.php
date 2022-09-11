<?php

require_once(__DIR__ . "/../bootstrap.php");

class Auth
{
    public function register(User $user)
    {

    }

    public static function login(User $user)
    {
        //find user and return true or false
        $db = new Db();

        return $db->verifyUser($user);
    }

    public function isUser(User $user): bool
    {
        return true;
    }
}