<?php

namespace app\models;

class Dons{
  private $pdo;

  public function __construct(\PDO $pdo){
    $this->pdo = $pdo;
  }

  public function create(array $input) {
      $stt = $this->pdo->prepare('INSERT INTO bngrc_dons(date_don, id_produit, quantite) VALUES (?, ?, ?)');
      $stt->execute([$input['date_don'], $input['id_produit'], $input['quantite']]);
  }

}
