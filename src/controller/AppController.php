<?php

namespace SwaggerExample\Controller;

use Swagger\Annotations\Swagger;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * @SWG\Info(title="PHP Silex Swagger Example", version="1.0.0")
 */

class AppController
{
    /**
     * @return JsonResponse
     */
    public function indexAction()
    {
        return new JsonResponse('I\'m up', Response::HTTP_OK, [], false);
    }

    /**
     * @return Swagger
     */
    public function swaggerAction()
    {
        return $this->buildSwaggerData();

        //@todo: Example below of a production API implementation.
        /*header('Content-Type: application/json');
        $key = 'swagger_data';

        if (getenv('debug')) {
            return $this->buildSwaggerData();
        } else {
            session_start();
            if (!isset($_SESSION[$key])) {
                $_SESSION[$key] = $this->buildSwaggerData();
            } else {
                $swagger = $_SESSION[$key];
            }
        }

        return $swagger;*/
    }

    /**
     * @return Swagger
     */
    private function buildSwaggerData()
    {
        require(__DIR__ . '/../../vendor/autoload.php');
        $swagger = \Swagger\scan(__DIR__ . '/../../src/');

        return $swagger;
    }
}
