<?php

/** @var \App\Core\Router $router */

use App\Controllers\LegalController;

$legalController = new LegalController();

$router->get('/mentions-legales', [$legalController, 'legal']);
$router->get('/confidentialite', [$legalController, 'privacy']);
$router->get('/cgu', [$legalController, 'cgu']);
// $router->get('/cgv', [$legalController, 'cgv']);
