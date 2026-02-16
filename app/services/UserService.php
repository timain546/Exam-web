<?php
namespace app\services;

use app\models\UserRepository;

class UserService {
    private $repo;
    public function __construct(UserRepository $repo) { $this->repo = $repo; }

    public function testLogin(array $input) {
        return $this->repo->find($input['name'], $input['password']);
    }

    public function registerLogin(array $input) {
        $hash = password_hash($input['password'], PASSWORD_DEFAULT);
        $id = $this->repo->create($input['name'], $hash);
        return $id;
    }

    public function getUsers() {
        return $this->repo->findAll();
    }
}
