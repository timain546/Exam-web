<?php
namespace app\controllers;

use app\models\Ville;
use app\utils\Utils;
use app\models\Besoins;
use flight\Engine;

class DashboardController {
    private $app;
    private $besoin;
    private $ville;

    public function __construct(Engine $app) {
        $this->app = $app;
        $this->ville = new Ville($this->app->db());
        $this->besoin = new Besoins($this->app->db());
    }

    public function dashboard() {
        $villes = $this->ville->getAllVilles();
        $result = [];
        foreach($villes as $v) {
            $result[] = [
                'id_ville' => $v['id_ville'],
                'nom' => $v['nom'],
                'produits' => $this->ville->getProduitsDeVille($v['id_ville'])
            ];
        }
        $this->app->render('dashboard', ['villes' => $result]);
    }

    public function showReinit() {
        $this->app->render('reinit');
    }

    public function reinit() {
        Utils::reinitAll($this->app->db());
        $this->app->json(['status' => 'ok']);
    }

    public function getRecapitulatifsBesoins() {
        $output = $this->besoin->getMontantsTotaux();
        $this->app->json(['status' => 'ok', 'besoin_total' => $output['besoin_total'], 'besoin_restant' => $output['besoin_restant']]);
    }

    public function showRecapitulatifs() {
        $this->app->render('recapitulatifs');
    }
}
