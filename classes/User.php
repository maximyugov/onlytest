<?php

require_once(__DIR__ . "/../bootstrap.php");

class User
{
    protected array $userData = [];

    public function getName(string $name): string
    {
        return $this->userData['name'];
    }

    public function getEmail(string $email): string
    {
        return $this->userData['email'];
    }

    public function setName(string $name): string
    {
        $this->userData['name'] = $name;
        return $this;
    }

    public function setEmail(string $email): string
    {
        $this->userData['email'];
        return $this;
    }

    
}