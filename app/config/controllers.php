<?php

/**
 * Register custom controllers
 */

$app->register(new \Silex\Provider\ServiceControllerServiceProvider());

$app['controllers.app'] = function() {
    return new \SwaggerExample\Controller\AppController();
};

$app['controllers.shoe'] = function() {
    return new \SwaggerExample\Controller\ShoeController();
};