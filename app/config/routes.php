<?php

use app\controllers\DashboardController;
use app\controllers\BesoinsController;
use app\controllers\DonsController;
use app\controllers\DispatchController;
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

    $router->get('/dispatch/simulation', [DispatchController::class, 'showSimulation']);
    $router->get('/api/dispatch/simulation/@mode', [DispatchController::class, 'getSimulation']);
    $router->post('/api/dispatch/execute', [DispatchController::class, 'dispatch']);

    $router->get('/reinit', [DashboardController::class, 'showReinit']);
    $router->post('/api/reinit', [DashboardController::class, 'reinit']);

}, [ SecurityHeadersMiddleware::class ]);
