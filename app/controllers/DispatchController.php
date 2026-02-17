<?php
namespace app\controllers;

use app\models\Besoins;
use app\models\Dons;
use flight\Engine;

class DispatchController {
    private $app;
    private $besoin;
    private $don;

    public function __construct($app) {
        $this->app = $app;
        $this->besoin = new Besoins($this->app->db());
        $this->don = new Dons($this->app->db());
    }

    public function showSimulation() {
        $this->app->render('simulationDispatch', ['besoins' => $this->besoin->getAllBesoins()]);
    }

    public function getSimulation($mode) {
        $besoins = [];

        if($mode == 0)
            $besoins = $this->don->calculerDispatchParDate();
        else if($mode == 1)
            $besoins = $this->don->calculerDispatchParQuantiteMin();
        else if($mode == 2)
            $besoins = $this->don->calculerDispatchProportionnelle();
        $this->app->json([
            'status' => 'ok',
            'besoins' => $besoins
        ]);
    }
}
