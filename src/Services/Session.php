<?php

namespace Onlytest\Services;

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

    public function userLoggedIn(): bool
    {
        return $this->session['auth'] = true;
    }

    public function userLoggedOut(): bool
    {
        $this->session['auth'] = false;
        return true;
    }

    public function old(string $key)
    {
        if (!array_key_exists($key, $this->session['old'])) {
            return null;
        }
        $value = $this->session['old'][$key];
        unset($this->session['old'][$key]);

        return $value;
    }

    public function setKey(string $key, string $value): bool
    {
        $this->session['old'][$key] = $value;
        return true;
    }
}