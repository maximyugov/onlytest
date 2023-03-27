<?php

namespace Onlytest;

class Db
{
    protected \PDO $db;

    public function __construct()
    {
        try {
            $this->db = new \PDO(\DB_DRIVER . ':host=' . \DB_HOST . ';dbname=' . \DB_NAME, \DB_USER, \DB_PASSWORD);
        } catch (\PDOException $e) {
            print "Database connection error: " . $e->getMessage();
            die();
        }
    }

    /**
     * Регистрация пользователя
     *
     * @param User $user
     * @return bool
     */
    public function registerUser(User $user): bool
    {
        $values = [
            'name'             => $user->getName(),
            'email'            => $user->getEmail(),
            'password_hash'    => self::passwordHash($user->getPassword()),
        ];
        $sql = 'INSERT INTO users (name, email, password_hash) VALUES (:name, :email, :password_hash)';
        $preparedStatement = $this->db->prepare($sql);

        return $preparedStatement->execute($values);
    }

    /**
     * Проверяет существует ли пользователь с таким e-mail
     *
     * @param User $user
     * @return array|mixed
     */
    public function verifyUser(User $user) //TODO
    {
        $values = [
            'email' => $user->getEmail(),
        ];
        
        $sql = 'SELECT * FROM users WHERE email = :email';
        $preparedStatement = $this->db->prepare($sql);
        $res = $preparedStatement->execute($values);
        
        if (false !== $res) {
            $row = $preparedStatement->fetchAll(\PDO::FETCH_CLASS, User::class);
            if (password_verify($user->getPassword(), $row[0]->password_hash)) {
                return $row[0];
            }
        }

        return [];
    }

    /**
     * Поиск пользователя по e-mail
     *
     * @param string $email
     * @return bool
     */
    public function findUserByEmail(string $email): bool
    {
        $values = [
            'email' => $email,
        ];
        
        $sql = 'SELECT * FROM users WHERE email = :email';
        $preparedStatement = $this->db->prepare($sql);
        $res = $preparedStatement->execute($values);
        
        if (false !== $res) {
            $row = $preparedStatement->fetchAll(\PDO::FETCH_CLASS, User::class);
            if ($row) {
                return true;
            }
        }

        return false;
    }

    /**
     * Хеширование пароля
     *
     * @param string $password
     * @return string
     */
    private static function passwordHash(string $password): string
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }
}