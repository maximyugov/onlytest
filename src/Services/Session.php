<?php

namespace Onlytest\Services;

use Onlytest\Models\User;

class Session
{
    private array $session = [
        'auth' => false,
        'old' => [],
    ];

    public function __construct()
    {
        // Получить данные запроса, данные куки (узнать пользователь залогинен или нет)
    }

    public function userLoggedIn(User $user)
    {
        return $this->session['auth'] = true;
    }

    public function userLoggedOut(User $user)
    {
        return $this->session['auth'] = false;
    }

    public function old(string $key)
    {
        if (!array_key_exists($key, $this->session)) {
            return null;
        }
        $value = $this->session['old'][$key];
        unset($this->session['old'][$key]);

        return $value;
    }
}