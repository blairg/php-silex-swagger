<?php

/**
 * Define the application routes
 */

/** AppController */
$app->get('/index', 'controllers.app:indexAction');
$app->get('/swagger.json', 'controllers.app:swaggerAction');

/** ShoeController */
$app->get('/shoe', 'controllers.shoe:getAllAction');
$app->post('/shoe', 'controllers.shoe:postAction');
$app->put('/shoe', 'controllers.shoe:putAction');
$app->delete('/shoe', 'controllers.shoe:deleteAction');

require __DIR__ . '/controllers.php';