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

        $authUser = $db->verifyUser($user);
        $_SESSION['name'] = $authUser->name;

        if (empty($authUser)) {
            return false;
        }

        return true;
    }

    public function isUser(User $user): bool
    {
        return true;
    }
}