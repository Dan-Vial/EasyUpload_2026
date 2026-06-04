<?php

declare(strict_types=1);

/**
 * EasyUpload - Front Controller
 * public/index.php
 */

use App\Core\Request;
use App\Core\Router;

require_once __DIR__ . '/../vendor/autoload.php';

/**
 * Charger variables d'environnement
 */
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

/**
 * Initialiser requête et router
 */
$request = new Request();
$router  = new Router();

/**
 * Middleware Turnstile
 */
use App\Services\TurnstileService;
use App\Middlewares\TurnstileMiddleware;

require_once __DIR__ . '/../src/Routes/TurnstileRoute.php';

/**
 * Routes GET
 */
$router->get('/', [App\Controllers\HomeController::class, 'index']);

$router->get('/download', [
    App\Controllers\DownloadController::class,
    'show',
]);

$router->get('/download/file', [
    App\Controllers\DownloadController::class,
    'file',
]);

$router->get('/login', [
    App\Controllers\AuthController::class,
    'loginPage',
]);

/**
 * Routes POST
 */
$router->post('/upload', [
    App\Controllers\UploadController::class,
    'store',
]);

$router->post('/login', [
    App\Controllers\AuthController::class,
    'login',
]);

$router->post('/logout', [
    App\Controllers\AuthController::class,
    'logout',
]);

$turnstileService = new TurnstileService();
$turnstileMiddleware = new TurnstileMiddleware($turnstileService);
$turnstileMiddleware->handle($request->uri());

/**
 * Dispatch HTTP
 */
$router->dispatch($request);
