<?php
namespace app\models;

class Produit {
    private $pdo;

    public function __construct(\PDO $pdo) { $this->pdo = $pdo; }

    public function getAllProduits() {
        $stt = $this->pdo->query('SELECT id_produit, nom, unite FROM bngrc_produits');
        return $stt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function find($id_produit) {
        $stt = $this->pdo->prepare('SELECT * FROM bngrc_produits WHERE id_produit = ? LIMIT 1');
        $stt->execute([$id_produit]);
        return $stt->fetch();
    }
}
