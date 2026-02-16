<?php

namespace app\controllers;

use flight\Engine;

class TemplateController {

    private Engine $app;

    public function __construct(Engine $app) {
        $this->app = $app;
    }

    public function home() {
        $this->app->render('template/index.php');
    }

    public function products() {
        $this->app->render('template/products.php');
    }

    public function login() {
        $this->app->render('template/login.php');
    }
}
