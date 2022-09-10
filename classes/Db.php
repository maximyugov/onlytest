<?php

require_once(__DIR__ . "/../bootstrap.php");

class Db
{
    public function __construct()
    {
        try {
            $db = new PDO(DB_DRIVER . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
        } catch (PDOException $e) {
            print "Database connection error: " . $e->getMessage();
            die();
        }
        return $db;
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