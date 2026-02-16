<?php
namespace app\models;

class Produit {
    private $pdo;

    public function __construct(\PDO $pdo) { $this->pdo = $pdo; }

    public function getAllProduits() {
        $stt = $this->pdo->query('SELECT id_produit, nom, unite FROM bngrc_produits');
        return $stt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
