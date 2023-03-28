<?php

namespace Onlytest\Services;

class Session
{
    private array $session = [
        'userIsAuthenticated' => false,
        'oldInputValues' => [],
        'flashMessage' => ''
    ];

    public function __construct()
    {
        // Получить данные запроса, данные куки (узнать пользователь залогинен или нет)
    }

    public function userLoggedIn(): bool
    {
        return $this->session['userIsAuthenticated'] = true;
    }

    public function userLoggedOut(): bool
    {
        $this->session['userIsAuthenticated'] = false;
        return true;
    }

    public function old(string $key)
    {
        if (!array_key_exists($key, $this->session['oldInputValues'])) {
            return null;
        }
        $value = $this->session['oldInputValues'][$key];
        unset($this->session['oldInputValues'][$key]);

        return $value;
    }

    public function setKey(string $key, string $value): bool
    {
        $this->session['oldInputValues'][$key] = $value;
        return true;
    }
}