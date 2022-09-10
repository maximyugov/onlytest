<?php

require_once(__DIR__ . "/../bootstrap.php");

class Auth
{
    public function register(User $user)
    {

    }

    public function login(string $name, string $password)
    {

    }

    public function isUser(User $user): bool
    {
        return true;
    }

    private function passwordHash(string $password): string
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }
}