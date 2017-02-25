<?php

/**
 * Define the application routes
 */

$app->get('/index', 'controllers.app:indexAction');
$app->get('/swagger.json', 'controllers.app:swaggerAction');

require __DIR__ . '/controllers.php';