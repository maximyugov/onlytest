<?php

require_once(__DIR__ . "/../bootstrap.php");

class User
{
    protected array $userData = [];

    public function getName(): string
    {
        return $this->userData['name'];
    }

    public function getEmail(string $email): string
    {
        return $this->userData['email'];
    }

    public function setName(string $name): User
    {
        $this->userData['name'] = $name;
        return $this;
    }

    public function setEmail(string $email): User
    {
        $this->userData['email'];
        return $this;
    }

    
}