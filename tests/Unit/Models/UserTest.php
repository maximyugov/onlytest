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
}