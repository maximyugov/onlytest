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
        $password = self::passwordHash($password);
        //connect to db and find user by name and email and create $user = new User
        if (!$user) {
            return false;
        }

        return $user;
    }

    private static function passwordHash(string $password): string
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }
}