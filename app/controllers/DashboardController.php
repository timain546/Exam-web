<?php
namespace app\controllers;

use app\models\Ville;
use app\utils\Utils;
use app\models\Besoins;
use flight\Engine;

class DashboardController {
    private $app;
    private $ville;

    public function __construct(Engine $app) {
        $this->app = $app;
        $this->ville = new Ville($this->app->db());
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
      Besoins::getMontantsTotaux($this->app->db());
      $this->app->json(['besoin_total' => 'besion_total', 'besoin_restant' => 'besion_restant']);
    }
}
