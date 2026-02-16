<?php
namespace app\controllers;

use app\models\Besoins;
use app\models\Ville;
use app\models\Produit;
use flight\Engine;

class BesoinsController {
    private $app;
    private $besoin;
    private $ville;
    private $produit;

    public function __construct(Engine $app) {
        $this->app = $app;
        $this->besoin = new Besoins($this->app->db());
        $this->ville = new Ville($this->app->db());
        $this->produit = new Produit($this->app->db());
    }

    public function showFormBesoins() {
        $villes = $this->ville->getAllVilles();
        $produits = $this->produit->getAllProduits();

        $this->app->render('formBesoins.php', [
            'villes' => $villes,
            'produits' => $produits
        ]);
    }
    public function createBesoins() {
        $input = [
            'date_besoin' => (string)($_POST['date_besoin'] ?? ''),
            'id_ville' => (string)($_POST['id_ville'] ?? ''),
            'id_produit' => (string)($_POST['id_produit'] ?? ''),
            'quantite' => (string)($_POST['quantite'] ?? '')
        ];
        $this->besoin->create($input);
        $this->app->json(['status' => 'ok']);
    }
}
