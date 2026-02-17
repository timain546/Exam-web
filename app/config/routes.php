<?php

use app\controllers\DashboardController;
use app\controllers\BesoinsController;
use app\controllers\DonsController;
use app\middlewares\SecurityHeadersMiddleware;
use flight\Engine;
use flight\net\Router;

/**
 * @var Router $router
 * @var Engine $app
 */

// This wraps all routes in the group with the SecurityHeadersMiddleware
$router->group('', function(Router $router) use ($app) {

    $router->get('/', [ DashboardController::class, 'dashboard' ]);
    $router->get('/besoins/create', [ BesoinsController::class, 'showFormBesoins' ]);
    $router->post('/api/besoins/create', [ BesoinsController::class, 'createBesoins' ]);

    $router->get('/dons/create', [DonsController::class, 'showFormDons']);
    $router->post('/api/dons/create', [DonsController::class, 'createDons']);


}, [ SecurityHeadersMiddleware::class ]);
