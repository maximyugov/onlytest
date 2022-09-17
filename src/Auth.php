<?php

namespace App;

class Auth
{
    public static function login(User $user)
    {
        $db = new Db();

        $authUser = $db->verifyUser($user);

        if (empty($authUser)) {
            return false;
        }

        $_SESSION['name'] = $authUser->name;
        $_SESSION['auth'] = true;

        return true;
    }
}