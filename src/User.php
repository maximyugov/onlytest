<?php

namespace App;

class User
{
    protected array $userData = [];

    public function getName(): string
    {
        return $this->userData['name'];
    }

    public function getEmail(): string
    {
        return $this->userData['email'];
    }
    
    public function getPassword(): string
    {
        return $this->userData['password'];
    }
    
    public function setName(string $name): User
    {
        $this->userData['name'] = $name;
        return $this;
    }

    public function setEmail(string $email): User
    {
        $this->userData['email'] = $email;
        return $this;
    }

    public function setPassword(string $password): User
    {
        $this->userData['password'] = $password;
        return $this;
    }
}