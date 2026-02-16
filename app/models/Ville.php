<?php

namespace app\models;

class Ville{
  private $pdo;

  public function __construct(\PDO $pdo){
    $this->pdo = $pdo;
  }

  public function getAllVille(){
    $stmt = $this->pdo->query("SELECT id_ville, name FROM bngrc_villes");
    return $stmt->fetchAll();
  }

}
