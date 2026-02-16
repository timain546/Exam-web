<?php
namespace app\controllers;

use app\models\Dons;
use app\models\Produit;
use flight\Engine;

class DonsController {
    private $app;
    private $dons;
    private $produit;

    public function __construct(Engine $app) {
        $this->app = $app;
        $this->dons = new Dons($this->app->db());
        $this->produit = new Produit($this->app->db());
    }

    public function showFormDons() {
        $produits = $this->produit->getAllProduits();
        $this->app->render('formDons.php', ['produits' => $produits]);
    }

    public function createDons() {
        $input = [
            'date_don' => (string)($_POST['date_don'] ?? ''),
            'id_produit' => (string)($_POST['id_produit'] ?? ''),
            'quantite' => (string)($_POST['quantite'] ?? '')
        ];
        $this->dons->create($input);
        $this->app->json(['status' => 'ok']);
    }
}