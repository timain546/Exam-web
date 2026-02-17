<?php
namespace app\models;

use app\models\Dons;
use app\models\Produit;
use app\models\Besoins;

class Achat {
    private $pdo;
    private $don;
    private $produit;
    private $besoin;

    public function __construct(\PDO $pdo) {
        $this->pdo = $pdo;
        $this->don = new Dons($this->app->db());
        $this->produit = new Produit($this->app->db());
        $this->besoin = new Besoins($this->app->db());
    }

    public function create(array $input) {
        $argent = (int)($this->don->getTotalDonsArgent() ?? 0);
        $produit = $this->produit->find((int)($input['id_produit'] ?? 0));

        $montant = $input['quantite'] * $produit['prix_unitaire'];
        $montant += $montant * ($input['taux'] / 100);
        $result = [];

        if($montant > $argent) {
            $result = [
                'status' => 'error',
                'message' => 'Argent insuffisant pour cette achat'
            ];
        } else {
            $this->besoin->reduireQuantiteRestante($input['id_besoin'], $input['quantite']);

            $stt = $this->pdo->prepare('INSERT INTO bngrc_achat(date_achat, id_besoin, quantite, montant, taux) VALUES (?, ?, ?, ?, ?)');
            $stt->execute([$input['date_achat'], $input['id_besoin'], $input['quantite'], $montant, $input['taux']]);
            $result = [
                'status' => 'ok',
                'message' => 'Succes'
            ];
        }
        return $result;
    }
}