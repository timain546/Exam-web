<?php
namespace app\models;

class Besoins {
    private $pdo;

    public function __construct(\PDO $pdo) { $this->pdo = $pdo; }

    public function create(array $input) {
        $stt = $this->pdo->prepare('INSERT INTO bngrc_besoins(date_besoin, id_ville, id_produit, quantite) VALUES (?, ?, ?, ?)');
        $stt->execute([$input['date_besoin'], $input['id_ville'], $input['id_produit'], $input['quantite']]);
    }

    public function getTotalBesoinsParProduit($id_ville){
        $stmt = $this->pdo->prepare("SELECT id_produit, SUM(quantite) as quantite FROM bngrc_besoins WHERE id_ville = ? GROUP BY id_produit");
        $stmt->execute([$id_ville]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
