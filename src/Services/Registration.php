<?php

namespace Onlytest\Services;

use Onlytest\Models\User;

class Registration
{
    public function register(User $user)
    {
        // Регистрация нового пользователя
    }

    /**
     * Проверка введенной при регистрации почты на уникальность
     *
     * @param User $user
     * @return bool
     */
    private function userExists(User $user): bool
    {
        return false;
    }

    /**
     * Проверка на совпадение введеных паролей при регистрации
     *
     * @param string $password
     * @param string $passwordConfirmation
     * @return bool
     */
    private function passwordConfirmed(string $password, string $passwordConfirmation): bool
    {
        return $password === $passwordConfirmation;
    }
}