<?php
namespace app\controllers;

use app\models\Ville;
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
}
