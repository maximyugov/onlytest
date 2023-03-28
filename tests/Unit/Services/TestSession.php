<?php

namespace Onlytest\Services;

use Onlytest\Models\User;
use PHPUnit\Framework\TestCase;

class TestSession extends TestCase
{
    public function test_user_logged_in()
    {
        $user = new User();
        $session = new Session();
        $this->assertTrue($session->userLoggedIn($user));
    }

    public function test_user_logged_out()
    {
        $user = new User();
        $session = new Session();
        $this->assertFalse($session->userLoggedOut($user));
    }
}
