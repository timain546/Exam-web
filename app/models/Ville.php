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

  public function getProduitsDeVille($id_ville) {
    $stmt = $this->pdo->prepare('SELECT p.id_produit as id_produit, p.nom as nom, b.quantite as besoin, b.quantite - b.quantite_restante as don, p.unite FROM bngrc_v_besoins_totaux b JOIN bngrc_produits p ON b.id_produit = p.id_produit WHERE b.id_ville = ?');
    $stmt->execute([$id_ville]);
    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
  }
}
