<?php

namespace app\models;

class Ville{
  private $pdo;

  public function __construct(\PDO $pdo){
    $this->pdo = $pdo;
  }

  public function getAllVilles(){
    $stmt = $this->pdo->query("SELECT id_ville, nom FROM bngrc_villes");
    return $stmt->fetchAll();
  }

}
