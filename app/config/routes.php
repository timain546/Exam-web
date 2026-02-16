<?php

use app\controllers\TemplateController;
use app\middlewares\SecurityHeadersMiddleware;
use flight\Engine;
use flight\net\Router;

/**
 * @var Router $router
 * @var Engine $app
 */

// This wraps all routes in the group with the SecurityHeadersMiddleware
$router->group('', function(Router $router) use ($app) {

    $router->get('/', [ TemplateController::class, 'home' ]);
    $router->get('/products', [ TemplateController::class, 'products' ]);

    $router->get('/dons/create', [DonsController::class, 'showFormDons']);
    $router->post('/api/dons/create', [DonsController::class, 'createDons']);


}, [ SecurityHeadersMiddleware::class ]);
