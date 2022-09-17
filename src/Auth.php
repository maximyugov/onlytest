<?php

namespace App;

class Auth
{
    public static function login(User $user): bool
    {
        $db = new Db();

        $authUser = $db->verifyUser($user);

        if (empty($authUser)) {
            return false;
        }

        $_SESSION['name'] = $authUser->getName();
        $_SESSION['auth'] = true;

        return true;
    }
}