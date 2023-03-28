<?php

namespace Onlytest;

/*class Auth
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
}*/

use Onlytest\Models\User;

class Auth
{
    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function login(): bool
    {
        if (!$this->userVerified($this->user)) {
            return false; //access denied
        }

        return session()->userLoggedIn($this->user); //true
    }

    public function logout(): bool
    {
        return session()->userLoggedOut($this->user);
    }
    
    private function userVerified(User $user): bool
    {
        $db = DB::getInstance();
//        запрос в базу данных, проверка совпадения логина и пароля
//        возврат true, если данные совпадают
//        false, если нет
        return true;
    }
}