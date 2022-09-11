<?php

require_once(__DIR__ . "/../bootstrap.php");

class Db
{
    protected $db;

    public function __construct()
    {
        try {
            $this->db = new PDO(DB_DRIVER . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
        } catch (PDOException $e) {
            print "Database connection error: " . $e->getMessage();
            die();
        }
    }

    public function storeUser(User $user)
    {

    }

    public function getUser(string $name, string $password)
    {
        $password = self::passwordHash($password);
        //connect to db and find user by name and email and create $user = new User
        if (!$user) {
            return false;
        }

        return $user;
    }

    public function registerUser(User $user)
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

    public function verifyUser(User $user)
    {
        $values = [
            'email'            => $user->getEmail(),
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

    /*
    function execute(PDO $db, string $sql, array $values): bool
    {
        $preparedStatement = $db->prepare($sql);
        return $preparedStatement->execute($values);
    }
    */

    private static function passwordHash(string $password): string
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }
}