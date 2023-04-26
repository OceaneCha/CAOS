<?php

namespace App\Model;

class UserManager extends AbstractManager
{
    public const TABLE = 'user';

    public function selectOneByEmail(string $email)
    {
        $query = "SELECT * FROM user where email=:email";
        $stmt = $this->pdo->prepare($query);

        $stmt->bindValue(':email', $email);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function insert(array $credentials): int
    {
        $query = "INSERT INTO " . static::TABLE .
        " (email, password, username) VALUES " .
        " (:email, :password, :username)";
        $stmt = $this->pdo->prepare($query);

        $stmt->bindValue(':email', $credentials['email']);
        $stmt->bindValue(':password', password_hash($credentials['password'], PASSWORD_DEFAULT));
        $stmt->bindValue(':username', $credentials['username']);

        $stmt->execute();
        return (int)$this->pdo->lastInsertId();
    }
}
