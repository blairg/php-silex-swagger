<?php

require_once __DIR__ . '/../vendor/autoload.php';

$app = new Silex\Application();
require __DIR__ . '/config/routing.php';
$app->run();
