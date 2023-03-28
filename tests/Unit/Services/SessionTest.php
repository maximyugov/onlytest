<?php

namespace Services;

use Onlytest\Services\Session;
use PHPUnit\Framework\TestCase;

class SessionTest extends TestCase
{
    public function test_user_logged_in()
    {
        $session = new Session();
        $this->assertTrue($session->userLoggedIn());
    }

    public function test_user_logged_out()
    {
        $session = new Session();
        $this->assertTrue($session->userLoggedOut());
    }

    public function test_old_null_key()
    {
        $session = new Session();
        $this->assertNull($session->old('undefined_key'));
    }

    public function test_old_key_with_value()
    {
        $session = new Session();
        $this->assertTrue($session->setKey('input_name', 'input_value'));
        $this->assertEquals('input_value', $session->old('input_name'));
    }
}
