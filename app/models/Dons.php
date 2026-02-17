<?php

namespace app\models;

class Dons{
  private $pdo;

  public function __construct(\PDO $pdo){
    $this->pdo = $pdo;
  }

  public function create(array $input) {
    $stt = $this->pdo->prepare('INSERT INTO bngrc_dons(date_don, id_produit, quantite, quantite_restante) VALUES (?, ?, ?, ?)');
    $stt->execute([$input['date_don'], $input['id_produit'], $input['quantite'], $input['quantite']]);
  }

  public function getTotalDonsParProduit(){
        $stmt = $this->pdo->prepare("SELECT id_produit, SUM(quantite) as quantite FROM bngrc_dons GROUP BY id_produit");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

}
