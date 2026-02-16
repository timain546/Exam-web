<?php

namespace app\models;

class UserRepository {
    private $pdo;
    public function __construct(\PDO $pdo) { $this->pdo = $pdo; }

    public function findAll() {
        $stt = $this->pdo->query("SELECT * FROM user");
        $result = [];
        while($row = $stt->fetch()) {
            $result[] = $row;
        }
        return $result;
    }

    public function find($name, $password) {
        $st = $this->pdo->prepare("SELECT * FROM user WHERE name = ?");
        $st->execute([(string)$name]);
        $message = '';

        if($row = $st->fetch()) {
            if(password_verify($password, $row['password_hash'])) {
                $message = 'OK';
            } else $message = 'password is wrong';
        } else $message = 'unknown';

        return $message;
    }

    public function create($name, $password_hash) {
        $st = $this->pdo->prepare("INSERT INTO user(name, password_hash, avatar) VALUES (?, ?, null)");
        $st->execute([(string)$name, (string)$password_hash]);
        return $this->pdo->lastInsertId();
    }
}
