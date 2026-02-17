<?php
namespace app\controllers;

use app\models\Besoins;
use flight\Engine;

class DispatchController {
    private $app;
    private $besoin;

    public function __construct() {
        $this->app = $app;
        $this->besoin = new Besoins($this->app->db());
    }

    public function showSimulation() {
        $this->app->render('dispatch', ['besoins' => $this->besoin->getAllBesoins()]);
    }

    public function getSimulation($mode) {
        $besoins = [];

        if($mode == 0)
            $besoins = $this->besoin->calculerDispatchParDate();
        else if($mode == 1)
            $besoins = $this->besoin->calculerDispatchParQuantiteMin();
        else if($mode == 2)
            $besoins = $this->besoin->calculerDispatchProportionnelle();
        $this->app->json([
            'status' => 'ok',
            'besoins' => $besoins
        ]);
    }
}