<?php
namespace app\controllers;

use app\Besoins;
use app\Dons;
use app\Achat;
use flight\Engine;

class AchatController {
    private $app;
    private $besoin;
    private $don;
    private $achat;

    public function __construct(Engine $app) {
        $this->app = $app;
        $this->besoin = new Besoin($this->app->db());
        $this->don = new Dons($this->app->db());
        $this->achat = new Achat($this->app->db());
    }

    public function showListeBesoins() {
        $this->app->render('achat', ['besoins' => $this->besoin->getAllBesoins()]);
    }

    public function createAchat($id_besoin) {
        $bs = $this->besoin->find($id_besoin);
        $id_produit = (int)($bs['id_produit'] ?? 0);
        $don = (int)($this->don->getTotalDonsPourUnProduit($id_produit) ?? 0);

        if($don > 0) {
            $this->app->json([
                'status' => 'error',
                'message' => 'Vous avez encore des dons a donner'
            ]);
        }
        
        $quantite = (int)($_POST['quantite'] ?? 0);
        if($bs['quantite'] < $quantite) {
            $this->app->json([
                'status' => 'error',
                'message' => 'Vous avez une quantite beaucoup trop grande'
            ]);
        }

        $input = [
            'id_produit' => $id_produit, /* J'ai besoin de id_produit pour le prochain calcule dans Achat::create */
            'id_besoin' => $id_besoin,
            'quantite' => $quantite,
            'date_achat' => (string)($_POST['date_achat'] ?? ''),
            'taux' => (int)($_POST['taux'] ?? 0)
        ];
        $result = $this->achat->create($input);
        $this->app->json([
            'status' => $result['status'],
            'message' => $result['message']
        ]);
    }
}