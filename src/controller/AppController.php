<?php

namespace SwaggerExample\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class AppController
{
    /**
     * @return JsonResponse
     */
    public function indexAction()
    {
        return new JsonResponse('I\'m up', Response::HTTP_OK, [], true);
    }
}