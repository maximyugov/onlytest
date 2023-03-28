<?php

use Onlytest\Models\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function test_user_name()
    {
        $user = new User();
        $user->setName('username');
        $this->assertEquals('username', $user->getName());
    }

    public function test_user_email()
    {
        $user = new User();
        $user->setEmail('username@example.com');
        $this->assertEquals('username@example.com', $user->getEmail());
    }

    public function test_user_password()
    {
        $user = new User();
        $user->setPassword('123qwerty');
        $this->assertEquals('123qwerty', $user->getPassword());
    }
}